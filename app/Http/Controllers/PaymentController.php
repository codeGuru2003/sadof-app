<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Payment;
use App\Models\PaymentType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = DB::table('payments')
                    ->join('members','payments.member_id','=','members.id')
                    ->join('payment_types','payments.payment_type_id','=','payment_types.id')
                    ->join('users','payments.process_by','=','users.id')
                    ->select('payments.*','payment_types.name as payname','users.name as username','members.firstname as mfirstname','members.middlename as mmiddlename', 'members.lastname as mlastname')
                    ->get();
        return view('payments.index',[
            'title' => 'Index',
            'payments' => $payments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::pluck('firstname','id');
        $paymenttypes = PaymentType::pluck('name','id');
        $processby = User::pluck('name','id');
        return view('payments.create',compact('members','paymenttypes','processby'),[
            'title' => 'Create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Payment();
        $payment->member_id = $request->member_id;
        $payment->payment_type_id = $request->payment_type_id;
        $payment->remarks = $request->remarks;
        $payment->amount = $request->amount;
        $payment->payment_date = $request->payment_date;
        $payment->process_by = Auth::id();
        $payment->save();
        return redirect('/payments')->with('msg', 'Payment successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $members = Member::pluck('firstname','id');
        $paymenttypes = PaymentType::pluck('name','id');
        $payment = Payment::with('member','paymenttype','user')->find($id);
        return view('payments.edit',compact('members','paymenttypes'),[
            'title' => 'Edit',
            'payment' => $payment,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'payment_type_id' => 'required|exists:payment_types,id',
            'remarks' => 'nullable|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update([
            'member_id' => $request->input('member_id'),
            'payment_type_id' => $request->input('payment_type_id'),
            'remarks' => $request->input('remarks'),
            'amount' => $request->input('amount'),
            'payment_date' => date('y-m-d:h-m-s'),
            'process_by' => Auth::id(),
        ]);
        return redirect()->route('payments.index')->with('msg', 'Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('payments.index')->with('msg', 'Payment deleted successfully');
    }

    public function search(Request $request){
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ]);

        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $payments = DB::table('payments')
            ->whereBetween('payment_date', [$startDate, $endDate])
            ->join('members','payments.member_id','=','members.id')
            ->join('payment_types','payments.payment_type_id','=','payment_types.id')
            ->join('users','payments.process_by','=','users.id')
            ->select('payments.*','payment_types.name as payname','users.name as username','members.firstname as mfirstname','members.middlename as mmiddlename', 'members.lastname as mlastname')
            ->get();

        return view('payments.index', ['payments' => $payments,'title' => 'Index']);
    }
    //Export the Latest Payments Record to PDF

    public function exportToPDF(){
        $payments = DB::table('payments')
        ->join('members','payments.member_id','=','members.id')
        ->join('payment_types','payments.payment_type_id','=','payment_types.id')
        ->join('users','payments.process_by','=','users.id')
        ->orderByDesc('payment_date')
        ->select('payments.*','payment_types.name as payname','users.name as username','members.firstname as mfirstname','members.middlename as mmiddlename', 'members.lastname as mlastname')
        ->get();
        $totalpayment = DB::table('payments')->sum('amount');
        $data = [
            'title' => 'Payment Report',
            'payments' => $payments,
            'totalpayment' => $totalpayment,
        ];
        $pdf = PDF::loadView('reports.payment', $data);
        return $pdf->download('payment_report.pdf');
    }
}

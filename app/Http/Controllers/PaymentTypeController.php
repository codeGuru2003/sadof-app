<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymenttypes = PaymentType::all();
        return view('paymenttypes.index', [
            'title' => 'Index',
            'paymenttypes' => $paymenttypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paymenttypes.create', [
            'title' => 'Create'
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
        $paymenttype = new PaymentType();
        $paymenttype->name = $request->input('name');
        $paymenttype->save();
        return redirect('/paymenttypes')->with('msg', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentType $paymentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paymenttype = PaymentType::find($id);
        return view('paymenttypes.edit',[
                'title' => 'Edit',
                'paymenttype' => $paymenttype,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paymenttype = PaymentType::find($id);
        $paymenttype->name = $request->input('name');
        $paymenttype->save();
        return redirect('/paymenttypes')->with('msg','Record was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymenttype = PaymentType::find($id);
        $paymenttype->delete();
        return redirect('/paymenttypes')->with('msg','Record was deleted successfully');
    }
}

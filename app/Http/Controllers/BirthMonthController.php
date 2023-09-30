<?php

namespace App\Http\Controllers;

use App\Models\BirthMonth;
use Illuminate\Http\Request;

class BirthMonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $birthmonths = BirthMonth::all();
        return view('birthmonths.index',[
            'title' => 'Index',
            'birthmonths' => $birthmonths,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('birthmonths.create', [
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
        $birthmonth = new BirthMonth();
        $birthmonth->name = $request->input('name');
        $birthmonth->save();
        return redirect('/birthmonths')->with('msg','Record was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BirthMonth  $birthMonth
     * @return \Illuminate\Http\Response
     */
    public function show(BirthMonth $birthMonth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BirthMonth  $birthMonth
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $birthmonth = BirthMonth::find($id);
        return view('birthmonths.edit', [
            'title' => 'Edit',
            'birthmonth' => $birthmonth,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BirthMonth  $birthMonth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $birthmonth = BirthMonth::find($id);
        $birthmonth->name = $request->input('name');
        $birthmonth->save();
        return redirect('/birthmonths')->with('msg','Record was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BirthMonth  $birthMonth
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $birthmonth = BirthMonth::find($id);
        $birthmonth->delete();
        return redirect('/birthmonths')->with('msg','Record was deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    //
    public function index(){
    	$genders = Gender::all();
        return view('genders.index',[
            'genders' => $genders,
            'title' => 'Index',
        ]);
    }

    public function create(){
        return view('genders.create',['title' => 'Create']);
    }

    public function store(Request $request){
        $gender = new Gender();
        $gender->name = $request->input('name');
        $gender->save();
        return redirect('/genders')->with('msg','Record created successfully');
    }

    public function edit($id){
        $gender = Gender::find($id);
        return view('genders.edit',[
            'gender' => $gender,
            'title' => 'Edit',
        ]);
    }

    public function update(Request $request, $id)
    {
        $gender = Gender::find($id);
        $gender->name = request('name');
        $gender->save();
        return redirect('/genders')->with('msg','Record was updated');
    }

    public function destroy($id)
    {
        $gender = Gender::find($id);
        $gender->delete();
        return redirect('/genders')->with('msg','Record was deleted successfully');
    }
}

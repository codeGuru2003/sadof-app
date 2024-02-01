<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessionController extends Controller
{
    public function index(){
        $professions = Profession::all();
        return view('professions.index',[
            'title' => 'List of Professions',
            'professions' => $professions,
        ]);
    }

    public function create(){
        return view('professions.create',[
            'title' => 'Create Profession',
        ]);
    }

    public function store(Request $request){
        Profession::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => Auth::user()->name,
        ]);

        return redirect('professions')->with('msg','Profession created successfully');
    }
}

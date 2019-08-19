<?php

namespace LU\Http\Controllers;
use LU\Major;

use Illuminate\Http\Request;

class AdminMajorsController extends Controller
{
    public function indexAndCreate(){
        $majors=Major::all();

        return view('Admin.majors.createAndShow',compact('majors'));
    }

    public function store(Request $request){
        Major::create($request->all());
        
        return redirect('admin/majors');
    }
}

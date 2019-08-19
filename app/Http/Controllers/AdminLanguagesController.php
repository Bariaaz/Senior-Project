<?php

namespace LU\Http\Controllers;
use LU\Language;

use Illuminate\Http\Request;

class AdminLanguagesController extends Controller
{
    public function indexAndCreate(){
        $languages=Language::all();

        return view('Admin.languages.createAndshow',compact('languages'));
    }

    public function store(Request $request){
        Language::create($request->all());
        
        return redirect('admin/languages');
    }
}

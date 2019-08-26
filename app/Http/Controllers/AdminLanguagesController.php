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

    public function edit($id){
        $language=Language::find($id);

        return view('Admin.languages.edit',compact('language'));
    }

    public function update(Request $request,$id){
        $l=Language::find($id)->update($request->all());
        
        return redirect('admin/languages');
    }

    public function destroy($id){
        Language::findOrFail($id)->delete();
        
        return redirect('admin/Languages');
    }
}

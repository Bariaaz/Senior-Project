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

    public function edit($id){
        $major=Major::find($id);
        
        return view('Admin.majors.edit',compact('major'));
    }

    public function update(Request $request, $id){
        $s=Major::find($id)->update($request->all());
        
        return redirect('admin/majors');
    }

    public function destroy($id){
        Major::findOrFail($id)->delete();
        
        return redirect('admin/majors');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Year;

class AdminYearsController extends Controller
{
    public function index(){
        $years=Year::all();
        return view('Admin.years.index', compact('years'));
    }

    public function create(){
        return view('Admin.years.create');
    }

    public function store(Request $request){
        $year=Year::create($request->all());
        
        return redirect('admin/years');
    }

    public function edit($id){
        $year=Year::find($id);
        return view('Admin.years.edit',compact('year'));
    }

    public function update(Request $request, $id){
        $year=Year::find($id)->update($request->all());
        return redirect('admin/years');
    }
}

<?php

namespace LU\Http\Controllers;

use Illuminate\Http\Request;
use LU\Year;
use LU\Http\Requests\CreateYearRequest;

class AdminYearsController extends Controller
{
    public function index(){
        $years=Year::all();
        return view('Admin.years.index', compact('years'));
    }

    public function create(){
        return view('Admin.years.create');
    }

    public function store(CreateYearRequest $request){
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

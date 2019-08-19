<?php

namespace LU\Http\Controllers;
use LU\Schedual;

use Illuminate\Http\Request;
use LU\Http\Requests\CreateSchedualRequest;

class AdminSchedualsController extends Controller
{
    public function index(){
        $scheduals=Schedual::all();

        return view('Admin.scheduals.index', compact('scheduals'));
    }

    public function create(){
        
        $weekdays=[
            'Monday'=>'Monday',
            'Tuseday'=>'Tuseday',
            'Wednesday'=>'Wednesday',
            'Thursday'=>'Thursday',
            'Friday'=>'Friday',
            'Saturday'=>'Saturday'
        ];

        return view('Admin.scheduals.create', compact('weekdays'));
    }

    public function store(CreateSchedualRequest $request){
        $s=Schedual::create($request->all());
        
        return redirect('admin/scheduals');
    }

    public function edit($id){
        $schedual=Schedual::find($id);
        $weekdays=[
            'Monday'=>'Monday',
            'Tuseday'=>'Tuseday',
            'Wednesday'=>'Wednesday',
            'Thursday'=>'Thursday',
            'Friday'=>'Friday',
            'Saturday'=>'Saturday'
        ];

        return view('Admin.scheduals.edit',compact('schedual','weekdays'));
    }

    public function update(Request $request, $id){
        $s=Schedual::find($id)->update($request->all());
        
        return redirect('admin/scheduals');
    }
}

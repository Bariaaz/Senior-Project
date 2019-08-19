<?php

namespace LU\Http\Controllers;
use Illuminate\Support\Facades\Input;
use LU\Http\Requests\CreateAdminRequest;
use LU\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
        return view('Admin.index');
    }

    public function index(){
        $users=User::where('role_id', 1)->get();
        
        return view('Admin.admins.index', compact('users'));
    }

    public function create(){
        return view('Admin.admins.create');
    }

    public function store(CreateAdminRequest $request){
        $input=$request->all();
        $input['password']=bcrypt($request->password);
        $user=User::create([
            'username'=>Input::get('username'),
            'email'=>Input::get('email'),
            'fileNumber'=>Input::get('fileNumber'),
            'password'=>$input['password'],
            'phone_Number'=>Input::get('phone_Number'),
            'is_active'=>Input::get('is_active'),
            'role_id'=>1
        ]);
        $user->save();
        
        return redirect('admin/admins');
    }

    public function edit($id){
        $user=User::find($id);
        
        return view('Admin.admins.edit',compact('user'));
    }

    public function update(Request $request, $id){
        $input=$request->all();
        if(trim($request->password)==''){
            $user=User::find($id)->update(array(
                'username'=>$input['username'],
                'email'=>$input['email'],
                'fileNumber'=>$input['fileNumber'],
                'phone_Number'=>$input['phone_Number'],
                'is_active'=>$input['is_active'],
                'role_id'=>1
            ));
        }else{
            $input['password']=bcrypt($request->password);
            $user=User::find($id)->update(array(
                'username'=>$input['username'],
                'email'=>$input['email'],
                'password'=>$input['password'],
                'fileNumber'=>$input['fileNumber'],
                'phone_Number'=>$input['phone_Number'],
                'is_active'=>$input['is_active'],
                'role_id'=>1
            ));
        }

        return redirect('/admin/admins');
    }

}

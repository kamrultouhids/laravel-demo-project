<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\RoleRequest;

use Illuminate\Http\Request;

use App\Model\Role;


class RoleController extends Controller
{

    public function index(){
        $data = Role::all();
        return view('admin.role.index',compact('data'));
    }


    public function create(){
        return view('admin.role.form');
    }


    public function store(RoleRequest $request) {
        $input = $request->all();
        try{
            Role::create($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('userRole')->with(['message'=>'Role Successfully saved !','alert-type'=>'success']);
        }else {
            return redirect('userRole')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function edit($id){
        $editModeData = Role::FindOrFail($id);
        return view('admin.role.form',compact('editModeData'));
    }


    public function update(RoleRequest $request,$id) {
          $data = Role::FindOrFail($id);
          $input = $request->all();
          try{
              $data->update($input);
              $bug = 0;
          }
          catch(\Exception $e){
              $bug = $e->errorInfo[1];
          }

          if($bug == 0){
              return redirect('userRole')->with(['message'=>'Role Successfully Updated !','alert-type'=>'success']);
          }else {
              return redirect('userRole')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
          }
    }


    public function destroy($id){
        try{
            $data = Role::FindOrFail($id);
            $data->delete();
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            echo "success";
        }elseif ($bug == 1451) {
            echo 'hasForeignKey';
        } else {
            echo 'error';
        }
    }


}

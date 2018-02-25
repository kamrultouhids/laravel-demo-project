<?php

namespace App\Http\Controllers;

use App\Model\Centre;

use Illuminate\Http\Request;

use App\Http\Requests\CentreRequest;


class CentreController extends Controller
{

    public function index()
    {
        $data = Centre::all();
        return view('admin.centre.index',compact('data'));
    }


    public function create()
    {
        return view('admin.centre.form');
    }


    public function store(CentreRequest $request)
    {
        $input = $request->all();
        try{
            Centre::create($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('centre')->with(['message'=>'Centre Successfully saved !','alert-type'=>'success']);
        }else {
            return redirect('centre')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function edit($id)
    {
        $editModeData = Centre::FindOrFail($id);
        return view('admin.centre.form',compact('editModeData'));
    }


    public function update(CentreRequest $request,$id)
    {
        $data = Centre::FindOrFail($id);
        $input = $request->all();
        try{
            $data->update($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('centre')->with(['message'=>'Centre Successfully Updated !','alert-type'=>'success']);
        }else {
            return redirect('centre')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function destroy($id)
    {
        try{
            $data = Centre::FindOrFail($id);
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

<?php

namespace App\Http\Controllers;

use App\Model\Referral;

use Illuminate\Http\Request;

use App\Http\Requests\ReferralRequest;


class ReferralController extends Controller
{

    public function index()
    {
        return view('admin.referral.index',[
            'data' => Referral::all()
        ]);
    }


    public function create()
    {
        return view('admin.referral.form');
    }


    public function store(ReferralRequest $request)
    {
        $input = $request->all();
        try{
            Referral::create($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('referral')->with(['message'=>'Referral Successfully saved !','alert-type'=>'success']);
        }else {
            return redirect('referral')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function edit($id)
    {
        return view('admin.referral.form',[
            'editModeData' => Referral::FindOrFail($id)
        ]);
    }


    public function update(ReferralRequest $request,$id)
    {
        $data = Referral::FindOrFail($id);
        $input = $request->all();
        try{
            $data->update($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('referral')->with(['message'=>'Referral Successfully Updated !','alert-type'=>'success']);
        }else {
            return redirect('referral')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function destroy($id)
    {
        try{
            $data = Referral::FindOrFail($id);
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

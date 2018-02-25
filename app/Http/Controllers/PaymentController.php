<?php

namespace App\Http\Controllers;

use App\Model\Payment;

use Illuminate\Http\Request;


class PaymentController extends Controller
{

    public function store(Request $request)
    {
        $request->request->add(['payment_date' =>  dateConvertFormtoDB($request->payment_date)]);
        try{
            Payment::create($request->all());
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect()->back()->with(['message'=>'Payment Successfully saved !','alert-type'=>'success']);
        }else {
            return redirect()->back()->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function edit($id)
    {
        $editModeData = Payment::where('payment_id',$id)->first();
        return view('admin.patient.edit-payment',['editModeData' => $editModeData]);
    }


    public function update(Request $request ,$id)
    {
        $data = Payment::FindOrFail($id);
        $request->request->add(['payment_date' =>  dateConvertFormtoDB($request->payment_date)]);
        try{
            $data->update($request->all());
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect()->back()->with(['message'=>'Payment Successfully Updated !','alert-type'=>'success']);
        }else {
            return redirect()->back()->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


}

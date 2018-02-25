<?php

namespace App\Http\Controllers;

use App\Model\Instruction;

use App\Model\Prescription;

use Illuminate\Http\Request;

class PrescriptionController extends Controller
{

    public function store(Request $request)
    {
        $request->request->add(['date' =>  date("Y-m-d")]);
        try{
            Prescription::create($request->all());
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect()->back()->with(['message'=>'Prescription Successfully saved !','alert-type'=>'success']);
        }else {
            return redirect()->back()->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function edit($id)
    {
        return view('admin.patient.edit-prescription',[
            'instruction' => Instruction::get(),
            'editModeData' => Prescription::with('instruction')->where('prescription_id',$id)->first(),
        ]);
    }


    public function update(Request $request,$id)
    {
        $data = Prescription::FindOrFail($id);
        $input = $request->all();
        try{
            $data->update($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect()->back()->with(['message'=>'Prescription Successfully Updated !','alert-type'=>'success']);
        }else {
            return redirect()->back()->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function getInstruction(Request $request)
    {
        return Instruction::where("instruction_id",$request->instruction_id)->first();
    }



}

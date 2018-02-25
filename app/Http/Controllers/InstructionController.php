<?php

namespace App\Http\Controllers;

use App\Model\Instruction;

use Illuminate\Http\Request;

use App\Http\Requests\InstructionRequest;


class InstructionController extends Controller
{

    public function index()
    {
        $data = Instruction::all();
        return view('admin.instruction.index',compact('data'));
    }


    public function create()
    {
        return view('admin.instruction.form');
    }


    public function store(InstructionRequest $request)
    {
        $input = $request->all();
        try{
            Instruction::create($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('instruction')->with(['message'=>'Instruction Successfully saved !','alert-type'=>'success']);
        }else {
            return redirect('instruction')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function edit($id)
    {
        $editModeData = Instruction::FindOrFail($id);
        return view('admin.instruction.form',compact('editModeData'));
    }


    public function update(InstructionRequest $request,$id)
    {
        $data = Instruction::FindOrFail($id);
        $input = $request->all();
        try{
            $data->update($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('instruction')->with(['message'=>'Instruction Successfully Updated !','alert-type'=>'success']);
        }else {
            return redirect('instruction')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function destroy($id)
    {
        try{
            $data = Instruction::FindOrFail($id);
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

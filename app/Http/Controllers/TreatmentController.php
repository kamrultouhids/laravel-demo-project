<?php

namespace App\Http\Controllers;

use App\User;

use App\Model\Patient;

use App\Model\Treatment;

use Illuminate\Http\Request;


class TreatmentController extends Controller
{

    public function store(Request $request)
    {
        $request->request->add(['date' =>  dateConvertFormtoDB($request->date)]);
        try{
            Treatment::create($request->all());
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect()->back()->with(['message'=>'Treatment Successfully saved !','alert-type'=>'success']);
        }else {
            return redirect()->back()->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function edit($id)
    {
        $editModeData        = Treatment::with('patient')->where('treatment_id',$id)->first();
        $patientPersonalInfo = Patient::with('profession')->where('patient_id',$editModeData->patient_id)->first();
        $user                = User::get()->toArray();

        $data = [];
        foreach ($user as $v){
            if($v['centre_id'] !=''){
                $centre_array  = unserialize($v['centre_id']);
                $v['centre_id_array'] = $centre_array;

                $search =  array_search($editModeData->patient->centre_id,$centre_array);
                if(gettype($search) == 'integer'){
                    $v['centre_id'] = $centre_array[$search];
                }else{
                    continue;
                }
                $data[] = $v;
            }
        }

        $result = [
            'patientPersonalInfo' => $patientPersonalInfo,'consultantList' => $data,'editModeData' => $editModeData
        ];
         return view('admin.patient.edit-treatment',$result);
    }


    public function update(Request $request ,$id)
    {
        $data = Treatment::FindOrFail($id);
        $request->request->add(['date' =>  dateConvertFormtoDB($request->date)]);
        try{
            $data->update($request->all());
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect()->back()->with(['message'=>'Treatment Successfully Updated !','alert-type'=>'success']);
        }else {
            return redirect()->back()->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


}

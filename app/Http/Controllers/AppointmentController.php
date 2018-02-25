<?php

namespace App\Http\Controllers;

use App\User;

use App\Model\Centre;

use App\Model\Patient;

use App\Model\Appointment;

use Illuminate\Http\Request;

use App\Lib\Enumerations\RoleId;

use App\Http\Requests\AppointmentRequest;


class AppointmentController extends Controller
{

    public function index()
    {
        $data = Appointment::with('patient')->get();
        return view('admin.appointment.index',compact('data'));
    }


    public function create()
    {
        $centreList         = Centre::pluck('title','centre_id');
        $physiotherapist    = User::where('role_id',RoleId::$PHYSIOTHERAPIST_ROLE)->pluck('name','user_id');
        $patientList        = Patient::get();

        return view('admin.appointment.form',[
            'centreList'            => $centreList,
            'physiotherapist'       => $physiotherapist,
            'patientList'           => $patientList,
        ]);

    }


    public function store(AppointmentRequest $request)
    {
        $request->request->add(['appointment_date' =>  dateConvertFormtoDB($request->appointment_date)]);

        try{
            Appointment::create($request->all());
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('appointment')->with(['message'=>'Payment Successfully saved !','alert-type'=>'success']);
        }else {
            return redirect('appointment')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }

    }


    public function edit($id)
    {
        $editModeData       = Appointment::FindOrFail($id);
        $centreList         = Centre::pluck('title','centre_id');
        $physiotherapist    = User::where('role_id',RoleId::$PHYSIOTHERAPIST_ROLE)->pluck('name','user_id');
        $patientList        = Patient::get();

        return view('admin.appointment.form',[
            'centreList'            => $centreList,
            'physiotherapist'       => $physiotherapist,
            'patientList'           => $patientList,
            'editModeData'          => $editModeData,
        ]);
    }


    public function update(AppointmentRequest $request,$id)
    {
        $request->request->add(['appointment_date' =>  dateConvertFormtoDB($request->appointment_date)]);
        $input = $request->all();
        $data =  Appointment::FindOrFail($id);

        try{
            $data->update($input);
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('appointment')->with(['message'=>'Instruction Successfully Updated !','alert-type'=>'success']);
        }else {
            return redirect('appointment')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function destroy($id)
    {
        $data =  Appointment::FindOrFail($id);
        try{
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

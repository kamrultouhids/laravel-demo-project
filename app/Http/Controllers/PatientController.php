<?php

namespace App\Http\Controllers;

use App\User;

use App\Model\Thana;

use App\Model\Centre;

use App\Model\Patient;

use App\Model\Payment;

use App\Model\Referral;

use App\Model\District;

use App\Model\Treatment;

use App\Model\Profession;

use App\Model\Instruction;

use App\Model\Prescription;

use Illuminate\Http\Request;

use App\Lib\Enumerations\RoleId;

use App\Lib\Enumerations\ImagePaths;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\PatientRequest;

use App\Repositories\PictureUploadRepository;


class PatientController extends Controller
{
    public $paginate = 2;
    protected $pictureUploadRepository;

    public function __construct(PictureUploadRepository $pictureUploadRepository)
    {
        $this->pictureUploadRepository = $pictureUploadRepository;
    }


    public function index(Request $request)
    {
        if( RoleId::$ADMIN_ROLE == Auth::user()->role_id ){
            $centerList = Centre::get();
            $data = Patient::with('centre');
        } else if(RoleId::$DATA_OPERATOR_ROLE == Auth::user()->role_id ){
            $user       = User::where('user_id',Auth::user()->user_id)->first();
            $centerList = Centre::whereIn('centre_id',unserialize($user->centre_id))->get();
            $data       = Patient::with('centre')->whereIn('centre_id',unserialize($user->centre_id));
        } else{
            $user       = User::where('user_id',Auth::user()->user_id)->first();
            $centerList = Centre::whereIn('centre_id',unserialize($user->centre_id))->get();
            $data       = Patient::with('centre')->whereIn('centre_id',unserialize($user->centre_id));
        }

        if (request()->ajax()) {
            if($request->centre_id  !='') {
                $data->where('centre_id',$request->centre_id);
            }
            if($request->search  !='') {
                $data->where(function($query) use ($request) {
                    $query->where('patient_code', 'like','%' . $request->search . '%')
                        ->orWhere('patient_name', 'like','%' . $request->search . '%')
                        ->orWhere('phone_no', 'like','%' . $request->search . '%')
                        ->orWhere('patient_email', 'like','%' . $request->search . '%')
                        ->orWhere('patient_email', 'like','%' . $request->search . '%')
                        ->orWhere('sex', 'like','%' . $request->search . '%')
                        ->orWhere('blood_group', 'like','%' . $request->search . '%');
                });
            }

            $data = $data->paginate($this->paginate);
            return   View('admin.patient.paginate', compact('data'))->render();
        }

        $data = $data->paginate($this->paginate);

        return view('admin.patient.index',['data' => $data,'centerList' => $centerList]);
    }


    public function create()
    {
        if( RoleId::$ADMIN_ROLE == Auth::user()->role_id ){
            $data = Centre::pluck('title','centre_id');
        }else{
            $user = User::where('user_id',Auth::user()->user_id)->first();
            $data = Centre::whereIn('centre_id',unserialize($user->centre_id))->pluck('title','centre_id');
        }

        return view('admin.patient.form',[
            'centreList'     => $data,
            'professionList' => Profession::pluck('profession_name','profession_id'),
            'referralList'   => Referral::pluck('title','referral_id'),
            'districtList'   => District::pluck('district_name','district_id'),
        ]);
    }


    public function store(PatientRequest $request)
    {
        $request->request->add(['visit_date' =>  dateConvertFormtoDB($request->visit_date)]);
        $request->request->add(['birth_date' =>  dateConvertFormtoDB($request->birth_date)]);
        $request->request->add(['created_by' =>  Auth::user()->user_id]);
        $request->request->add(['updated_by' =>  Auth::user()->user_id]);

        try{
            if($request->avatar_file!=''){
                $imagePath  = ImagePaths::$PATIENT_PROFILE;
                $image      =  $this->pictureUploadRepository->base64toImageUploadWithResize($request->avatar_file,$imagePath,false,false,imageName());
                $request->request->add(['avatar_file' =>  $image['full_name']]);
            }
            Patient::create($request->all());
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('patient')->with(['message'=>'Patient Successfully saved !','alert-type'=>'success']);
        }else {
            return redirect('patient')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function edit($id)
    {
        return view('admin.patient.form',[
            'editModeData'   => Patient::FindOrFail($id),
            'centreList'     => Centre::pluck('title','centre_id'),
            'professionList' => Profession::pluck('profession_name','profession_id'),
            'referralList'   => Referral::pluck('title','referral_id'),
            'districtList'   => District::pluck('district_name','district_id'),
        ]);
    }


    public function update(PatientRequest $request,$id)
    {
        $data = Patient::FindOrFail($id);

        $request->request->add(['visit_date' =>  dateConvertFormtoDB($request->visit_date)]);
        $request->request->add(['birth_date' =>  dateConvertFormtoDB($request->birth_date)]);
        $request->request->add(['created_by' =>  Auth::user()->user_id]);
        $request->request->add(['updated_by' =>  Auth::user()->user_id]);

        $image = $request->avatar_file;

        if(isset($image) && $image !='') {
            $imagePath  = ImagePaths::$PATIENT_PROFILE;
            if($data->avatar_file !=''){
                $imageName = explode('.',$data->avatar_file);
                $imageName = $imageName[0];
            }
            if (!isset($imageName)){$imageName = imageName(); }
            $image      =  $this->pictureUploadRepository->base64toImageUploadWithResize($request->avatar_file,$imagePath,false,false,$imageName);
            $request->request->add(['avatar_file' =>  $image['full_name']]);
        }

        try{
            $data->update($request->all());
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('patient')->with(['message'=>'Patient Successfully Updated !','alert-type'=>'success']);
        }else {
            return redirect('patient')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function destroy($id)
    {
        try{
            $data = Patient::FindOrFail($id);
            if (!is_null($data->avatar_file))
            {
                if(file_exists(ImagePaths::$PATIENT_PROFILE.$data->avatar_file) AND !empty($data->avatar_file))
                {
                    unlink(ImagePaths::$PATIENT_PROFILE.$data->avatar_file);
                }
            }
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


    public function getThana(Request $request)
    {
        $result = Thana::select('thana_id', 'thana_name')->where("district_id",$request->district_id)->get();
        return response()->json(array('result' => $result));
    }


    public function show($id)
    {
        $patientPersonalInfo    = Patient::with('profession')->where('patient_id',$id)->first();
        $treatment              = Treatment::with('consultant')->where('patient_id',$id)->get();
        $payment                = Payment::where('patient_id',$id)->get();
        $user                   = User::get()->toArray();
        $instruction            = Instruction::get();
        $prescription           = Prescription::with('instruction')->get();

        $data = [];
        foreach ($user as $v){
            if($v['centre_id'] !=''){
                $centre_array           = unserialize($v['centre_id']);
                $v['centre_id_array']   = $centre_array;

                $search =  array_search($patientPersonalInfo->centre_id,$centre_array);
                if(gettype($search) == 'integer'){
                    $v['centre_id'] = $centre_array[$search];
                }else{
                    continue;
                }
                $data[] = $v;
            }
        }

        $result = [
            'patientPersonalInfo' => $patientPersonalInfo,'consultantList' => $data,
            'treatment' => $treatment,'payments' => $payment,'instruction' => $instruction,'prescriptions' => $prescription
        ];

        return view('admin.patient.patient-details',$result);
    }

}

<?php

namespace App\Http\Controllers;

use App\User;

use App\Model\Centre;

use Illuminate\Http\Request;

use App\Lib\Enumerations\RoleId;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Lib\Enumerations\ImagePaths;

use App\Http\Requests\DataOpratorRequest;

use App\Repositories\PictureUploadRepository;


class DataOperatorController extends Controller
{


    protected $pictureUploadRepository;

    public function __construct(PictureUploadRepository $pictureUploadRepository)
    {
        $this->pictureUploadRepository = $pictureUploadRepository;
    }


    public function index()
    {
        return view('admin.data_operator.index',[
            'data'   => User::where('role_id',RoleId::$DATA_OPERATOR_ROLE)->get(),
            'centre' => Centre::get()->toArray(),
        ]);
    }


    public function create()
    {
        return view('admin.data_operator.form',[
            'centreList' => Centre::get()
        ]);
    }


    public function store(DataOpratorRequest $request)
    {

        $request->request->add(['role_id'    =>  RoleId::$DATA_OPERATOR_ROLE]);
        $request->request->add(['password'   =>  Hash::make($request->password)]);
        $request->request->add(['centre_id'  =>  serialize($request->centre_id)]);
        $request->request->add(['created_by' =>  Auth::user()->user_id]);
        $request->request->add(['updated_by' =>  Auth::user()->user_id]);

        try{
            if($request->avatar_file!=''){
                $imagePath  = ImagePaths::$DATA_OPERATOR_PROFILE;
                $image      =  $this->pictureUploadRepository->base64toImageUploadWithResize($request->avatar_file,$imagePath,false,false,imageName());
                $request->request->add(['avatar_file' =>  $image['full_name']]);
            }
            User::create($request->all());
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('dataOperator')->with(['message'=>'Data Operator Successfully saved !','alert-type'=>'success']);
        }else {
            return redirect('dataOperator')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function edit($id)
    {
        return view('admin.data_operator.form',[
            'centreList'   => Centre::get(),
            'editModeData' => User::FindOrFail($id)
        ]);
    }


    public function update(DataOpratorRequest $request,$id)
    {
        $data = User::FindOrFail($id);

        $request->request->add(['centre_id'  =>  serialize($request->centre_id)]);
        $request->request->add(['created_by' =>  Auth::user()->user_id]);
        $request->request->add(['updated_by' =>  Auth::user()->user_id]);

        $image = $request->avatar_file;

        if(isset($image) && $image !='') {
            $imagePath  = ImagePaths::$DATA_OPERATOR_PROFILE;
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
            return redirect('dataOperator')->with(['message'=>'Data Operator Successfully Updated !','alert-type'=>'success']);
        }else {
            return redirect('dataOperator')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function destroy($id)
    {
        try{
            $data = User::FindOrFail($id);

            if (!is_null($data->avatar_file))
            {
                if(file_exists(ImagePaths::$DATA_OPERATOR_PROFILE.$data->avatar_file) AND !empty($data->avatar_file))
                {
                    unlink(ImagePaths::$DATA_OPERATOR_PROFILE.$data->avatar_file);
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
}

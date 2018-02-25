<?php

namespace App\Http\Controllers;

use App\User;

use App\Model\Centre;

use Illuminate\Http\Request;

use App\Lib\Enumerations\RoleId;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Lib\Enumerations\ImagePaths;

use App\Http\Requests\PhysiotherapistRequest;

use App\Repositories\PictureUploadRepository;


class PhysiotherapistController extends Controller
{


    protected $pictureUploadRepository;

    public function __construct(PictureUploadRepository $pictureUploadRepository)
    {
        $this->pictureUploadRepository = $pictureUploadRepository;
    }


    public function index()
    {
        return view('admin.physiotherapist.index',[
            'data'   => User::where('role_id',RoleId::$PHYSIOTHERAPIST_ROLE)->get(),
            'centre' => Centre::get()->toArray(),
        ]);
    }


    public function create()
    {
        return view('admin.physiotherapist.form',[
            'centreList' => Centre::get()
        ]);
    }


    public function store(PhysiotherapistRequest $request)
    {
        $request->request->add(['role_id'    =>  RoleId::$PHYSIOTHERAPIST_ROLE]);
        $request->request->add(['password'   =>  Hash::make($request->password)]);
        $request->request->add(['centre_id'  =>  serialize($request->centre_id)]);
        $request->request->add(['created_by' =>  Auth::user()->user_id]);
        $request->request->add(['updated_by' =>  Auth::user()->user_id]);

        try{
            if($request->avatar_file!=''){
                $imagePath  = ImagePaths::$PHYSIOTHERAPIST_PROFILE;
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
            return redirect('physiotherapist')->with(['message'=>'Physiotherapist Successfully saved !','alert-type'=>'success']);
        }else {
            return redirect('physiotherapist')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function edit($id)
    {
        return view('admin.physiotherapist.form',[
            'centreList'   => Centre::get(),
            'editModeData' => User::FindOrFail($id)
        ]);
    }


    public function update(PhysiotherapistRequest $request,$id)
    {
        $data = User::FindOrFail($id);

        $request->request->add(['centre_id'  =>  serialize($request->centre_id)]);
        $request->request->add(['created_by' =>  Auth::user()->user_id]);
        $request->request->add(['updated_by' =>  Auth::user()->user_id]);

        $image = $request->avatar_file;

        if(isset($image) && $image !='') {
            $imagePath  = ImagePaths::$PHYSIOTHERAPIST_PROFILE;
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
            return redirect('physiotherapist')->with(['message'=>'Physiotherapist Successfully Updated !','alert-type'=>'success']);
        }else {
            return redirect('physiotherapist')->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }
    }


    public function destroy($id)
    {
        try{
            $data = User::FindOrFail($id);
            if (!is_null($data->avatar_file))
            {
                if(file_exists(ImagePaths::$PHYSIOTHERAPIST_PROFILE.$data->avatar_file) AND !empty($data->avatar_file))
                {
                    unlink(ImagePaths::$PHYSIOTHERAPIST_PROFILE.$data->avatar_file);
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

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\User;

use App\Model\Patient;

use Illuminate\Http\Request;

use App\Lib\Enumerations\RoleId;

use App\Lib\Enumerations\UserStatus;


class HomeController extends Controller
{

    public function index()
    {
        $total_physiotherapists =   User::where('role_id' , RoleId::$PHYSIOTHERAPIST_ROLE)->get()->count();
        $total_data_operator    =   User::where('role_id' , RoleId::$DATA_OPERATOR_ROLE)->get()->count();
        $total_patient          =   Patient::where('status' , UserStatus::$ACTIVE)->get()->count();

        $data = [
            'physiotherapists'  => $total_physiotherapists,
            'data_operator'     => $total_data_operator,
            'patient'           => $total_patient,
        ];

        return view('admin.adminHome')->with($data);
    }



}

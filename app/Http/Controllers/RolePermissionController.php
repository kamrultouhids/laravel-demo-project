<?php

namespace App\Http\Controllers;

use App\MOdel\Role;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use function MongoDB\BSON\toJSON;

use Illuminate\Http\Request;

use App\Http\Requests\RolePermissionRequest;


class RolePermissionController extends Controller
{

    public function index()
    {
        return view('admin.role.add_user_permission', [
            'data' =>  Role::get()
        ]);
    }



    public function getAllMenu(Request $request)
    {
        $role_id     = $request->role_id;
        $permissions =  DB::table('menus')
                        ->select(DB::raw('menus.id, menus.name, menus.menu_url,menu_permission.menu_id'))
                        ->join('menu_permission', 'menu_permission.menu_id', '=', 'menus.id')
                        ->where('menu_permission.role_id', '=', $role_id)
                        ->get()->toArray();


        $allMenus = json_decode(DB::table('menus')
                    ->where('menus.status', '=', 1)
                    ->orderBy('menu_serial_id','ASC')
                    ->get()->toJSON(),true);

        $arrayFormat = [];
        foreach ($allMenus as $allMenu)
        {
            $hasPermission = array_search($allMenu['id'], array_column($permissions, 'menu_id'));

            if(gettype($hasPermission) == 'integer'){
                $allMenu['hasPermission'] ='yes';
            }else{
                $allMenu['hasPermission'] ='no';
            }

            $arrayFormat[] = $allMenu;
        }

        return ['arrayFormat'=>$arrayFormat];
    }



    public function store(RolePermissionRequest $request)
    {

        try{
            DB::beginTransaction();

                $role_id    =  $request->role_id;
                DB::table('menu_permission')->where('role_id', '=', $role_id)->delete();
                $menu       = count($request->menu_id);

                if($menu == 0){
                    DB::commit();
                    return redirect()->back()->with(['message'=>'Role permission update successfully !','alert-type'=>'success']);
                }

                $menuFormat =[];
                for ($i = 0; $i < $menu; $i++) {
                    $menuFormat[]=[
                        "menu_id" => $request->menu_id[$i],
                        "role_id" => $role_id,
                    ];
                }

                DB::table('menu_permission')->insert($menuFormat);

            DB::commit();
            $bug = 0;
        }
        catch(\Exception $e){
            DB::rollback();
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect()->back()->with(['message'=>'Role permission update successfully !','alert-type'=>'success']);
        } else {
            return redirect()->back()->with(['message'=>'Something Error Found !, Please try again','alert-type'=>'error']);
        }

    }



}

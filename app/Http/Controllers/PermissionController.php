<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\assign_permission;
use App\Models\permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PermissionController extends Controller
{
    //
    public function index(Request $request)
    {   $users = Admin::all();
        return view('admin.views.permissions',['users'=>$users]);
    }
    public function getUserPermission(Request $request)
    {
        $data = [];
        $selected = [];
        $permission = permission::all();
        foreach ($permission as $key => $value)
        {
            $data[$value->permission_group][] =
                ['permission_id'=>$value->id,'permission_title'=>$value->permission_title];
        }
        $assign = assign_permission::where('relation_id',$request->id)->first();
        if ($assign)
        {
            $selected = explode(',',$assign->permission_id);
        }
        return view('admin.views.permissionform', ['data' => $data,'selected'=>$selected])->render();
    }

    public function updateUserPermission(Request $request)
    {
        $relation_id = $request->user_id;
        $permission_id = $request->permission_id;
        $action = $request->action;
        $permission = assign_permission::where('relation_id', $relation_id)->first();
        if ('enable' === $action) {
            if ($permission) {
                $permissionIds = explode(',', $permission->permission_id);
                $permissionIds[] = $permission_id;
                assign_permission::where('relation_id', $relation_id)
                    ->update([
                        'permission_id' => implode(',', $permissionIds)
                    ]);

            } else {
                assign_permission::create([
                    'relation_id' => $relation_id,
                    'permission_id' => implode(',', [$permission_id])
                ]);
            }
        } elseif ('disable' === $action) {
            if ($permission) {
                $permissionIds = explode(',', $permission->permission_id);
                if (($key = array_search($permission_id, $permissionIds)) !== false) {
                    unset($permissionIds[$key]);
                }
                assign_permission::where('relation_id', $relation_id)
                    ->update([
                        'permission_id' => implode(',', $permissionIds)
                    ]);
            }
        }

    }

}

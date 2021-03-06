<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Permission;
use App\Http\Requests\StoreUpdatePermissionProfile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    public function permissions(Profile $profile)
    {
        if (!$profile) {
            return redirect()->back();
        }

        $permissions = $profile->permissions()->get();

        return view('admin.pages.profiles.permissions.index', [
            'profile' => $profile,
            'permissions' => $permissions
        ]);

    }

     public function permissionsAvailable (Profile $profile) {
         if (!$profile) {
             redirect()->back();
         }
         $permissions = $profile->permissionsAvailable()->get();

         return view('admin.pages.profiles.permissions.create', [
             'profile' => $profile,
             'permissions' => $permissions
         ]);
     }


    public function attachPermissionsProfile (Request $request, Profile $profile) {
        $permissions = $request->permissions;
        if (!$permissions){
            return redirect()->back()->with('error', 'É necessário selecionar ao menos 1 permissão');
        }
        foreach ($permissions as $permission){
            $profile->permissions()->attach($permission);
        }
        return redirect()->route('profiles.permissions', $profile->id)->with('message', 'Permissão associada com sucesso');
    }

    public function detachPermissionsProfile (Profile $profile, Permission $permission) {
        if (!$profile || !$permission)  {
            return redirect()->back();
        }
        $profile->permissions()->detach($permission->id);
        return redirect()->route('profiles.permissions', $profile->id)->with('message', 'Permissão desassociada com sucesso');
    }

    public function search (Request $request, Profile $profile) {
        $permissions = $profile->searchPermissions($profile->permissions(), $request->filter)->paginate(1);

        return view('admin.pages.profiles.permissions.index', [
            'profile' => $profile,
            'permissions' => $permissions
        ]);
    }

    public function searchPermissionsAvailable (Request $request, Profile $profile) {
        $permissions = $profile->searchPermissions($profile->permissionsAvailable(), $request->filter)->paginate(1);

        return view('admin.pages.profiles.permissions.create', [
            'profile' => $profile,
            'permissions' => $permissions
        ]);
    }



}

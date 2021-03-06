<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index () {
        $permissions = Permission::latest()->paginate();
        return view('admin.pages.permissions.index', [
            'permissions' => $permissions
        ]);
    }

    public function create () {
        return view('admin.pages.permissions.create');
    }

    public function store (StoreUpdatePermission $request) {
        Permission::create($request->all());
        return redirect()->route('permissions.index');
    }

    public function show (Permission $permission) {

        if (!$permission) {
            return redirect()->back();
        }

        return view ('admin.pages.permissions.show', [
            'permission' => $permission
        ]);
    }

    public function destroy (Permission $permission) {

        if (!$permission) {
            return redirect()->back();
        }

//        if ($permission->details->count() > 0) {
//            return redirect()->back()->with('error', 'Existem detalhes vinculado a esse permissiono, portanto não é possivel deletar-lo');
//        }

        $permission->delete();
        return redirect()->route('permissions.index');
    }

    public function search (Request $request) {
        $permissions = Permission::search($request->filter);

        return view('admin.pages.permissions.index', [
            'permissions' => $permissions
        ]);
    }

    public function edit (Permission $permission) {
        if (!$permission) {
            return redirect()->back();
        }

        return view ('admin.pages.permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function update(StoreUpdatePermission $request, Permission $permission)
    {
        if (!$permission)
            return redirect()->back();

        $permission->update($request->all());

        return redirect()->route('permissions.index');
    }
}

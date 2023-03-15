<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\PermissionInterface;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionInterface
{
    public function index($rolesDataTable)
    {
        // TODO: Implement index() method.
    }

    public function create()
    {
       return view('Permissions.create');
    }

    public function store($request)
    {
       Permission::create(['name' => $request->name]);
        Alert::toast('Permission Created');
        return redirect(route('admin.Permission.index'));
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function delete($request)
    {
        // TODO: Implement delete() method.
    }
}

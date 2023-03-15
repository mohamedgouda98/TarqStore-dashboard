<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\RolesInterface;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesRepository implements RolesInterface
{
    public function index($rolesDataTable)
    {
        dump('create Admin');
        $admin = Admin::find(Auth::user()->id);
//        $admin = Admin::create([
//            'name' => 'Tariq',
//            'email' => 'tariq@gmail.com',
//            'phone' => '01000000'
//        ]);

//        $admin->assignRole('blog');
//        $admin->givePermissionTo('category');
        dd($admin->getAllPermissions());


        return $rolesDataTable->render('Roles.index');
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('Roles.create', compact('permissions'));
    }

    public function store($request)
    {
        $role = Role::create(['name' => $request->name]);

        foreach ($request->permission_ids as $permission_id)
        {

            $permission = Permission::find($permission_id);
            $role->givePermissionTo($permission);
        }

        Alert::toast('Category Created');
        return redirect(route('admin.role.index'));
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

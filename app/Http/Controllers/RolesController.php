<?php

namespace App\Http\Controllers;

use App\DataTables\RolesDataTable;
use App\Http\Interfaces\RolesInterface;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public $rolesInterface;
    public function __construct(RolesInterface $rolesInterface)
    {
        $this->rolesInterface = $rolesInterface;
    }

    public function index(RolesDataTable $blogCategoriesDataTable)
    {
        return $this->rolesInterface->index($blogCategoriesDataTable);
    }

    public function create()
    {
        return $this->rolesInterface->create();
    }

    public function store(Request $request)
    {
        return $this->rolesInterface->store($request);
    }

    public function edit($id)
    {
        return $this->rolesInterface->edit($id);
    }

    public function update( $request)
    {
        return $this->rolesInterface->update($request);
    }

    public function delete( $request)
    {
        return $this->rolesInterface->delete($request);
    }

}

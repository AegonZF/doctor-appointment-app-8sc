<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate correct creation
        $request->validate(['name' => 'required|unique:roles,name']);
        //If everything is right, create rol
        Role::create(['name' => $request->name]);
        
        //Single use variable
        session()->flash('swal',
        [
            'icon' => 'success',
            'title' => 'Rol created',
            'text' => 'The role has been succesfully created'
        ]);
        //Redirect to main table
        return redirect()->route('admin.roles.index')->with('success','Role created succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //Restrict editing in the first 4 roles
        if ($role->id <=4) {
             session()->flash('swal',
        [
            'icon' => 'error',
            'title' => 'Error',
            'text' => "You can't edit this role"
        ]);
        return redirect()->route('admin.roles.index');

    }
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //validate correct creation
        $request->validate(['name' => 'required|unique:roles,name,' . $role->id]);
        
        //If there were no changes dont update
        if ($role->name === $request->name) {
             session()->flash('swal',
        [
            'icon' => 'info',
            'title' => 'No changes',
            'text' => 'No changes were detected'
        ]);

        //Redirect to the same place
        return redirect()->route('admin.roles.edit', $role);
            # code...
        }
        
        //If everything is right, edit rol
        $role->update(['name'=> $request->name]);
        
        //Single use variable
        session()->flash('swal',
        [
            'icon' => 'success',
            'title' => 'Rol updated',
            'text' => 'The role has been succesfully updated'
        ]);
        //Redirect to main table
        return redirect()->route('admin.roles.index', $role);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {

        //Restrict editing in the first 4 roles
        if ($role->id <=4) {
             session()->flash('swal',
        [
            'icon' => 'error',
            'title' => 'Error',
            'text' => "You can't delete this role"
        ]);
        return redirect()->route('admin.roles.index');

    }

        //Delete element
        $role->delete();
        session()->flash('swal',
        [
            'icon' => 'success',
            'title' => 'Rol deleted',
            'text' => 'The role has been succesfully deleted'
        ]);

        //Redirect to the same place
        return redirect()->route('admin.roles.index');
    }
}

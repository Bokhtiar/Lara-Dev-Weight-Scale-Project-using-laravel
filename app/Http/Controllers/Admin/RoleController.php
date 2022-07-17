<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('acl.role.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Role::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $role = Role::create([
                    'name' => $request->name,
                ]);

                if (!empty($role)) {
                    DB::commit();
                    return redirect()->route('admin.role.index')->with('success','Role Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $edit = Role::find($id);
            $roles = Role::all();
            return view('acl.role.index', compact('roles', 'edit'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.role.index')->with('success', 'something wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = Role::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $roleU = Role::find($id);
                $role = $roleU->update([
                    'name' => $request->name,
                ]);

                if (!empty($role)) {
                    DB::commit();
                    return redirect()->route('admin.role.index')->with('success','Role Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Role::find($id)->delete();
            return redirect()->route('admin.role.index')->with('success', 'Role Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('admin.role.index')->with('error', 'something wrong');
        }
    }
}

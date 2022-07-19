<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $servies = Service::all();
            return view('admin.service.index', compact('servies'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Service::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $image = Service::query()->Image($request);
                $service = Service::create([
                    'name' => $request->name,
                    'body' => $request->body,
                    'image' => json_encode($image)
                ]);

                if (!empty($service)) {
                    DB::commit();
                    return redirect()->route('admin.service.index')->with('success','Service Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
            }
        }
    }

    public function show($id)
    {
        try {
            $show = Service::query()->FindID($id);
            return view('admin.service.show', compact('show'));
        } catch (\Throwable $th) {
            throw $th;
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
            $edit = Service::query()->FindID($id);
        return view('admin.service.createOrUpdate', compact('edit'));
        } catch (\Throwable $th) {
            throw $th;
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
        $validated = Service::query()->Validation($request->all());
        if($validated){
            try{
                $update = Service::query()->FindID($id);
                DB::beginTransaction();
                $reqImage = $request->image;
                if($reqImage){
                    $newimage = Service::query()->Image($request);
                }else{
                    $image = $update->image;
                }

                $serviceU = $update->update([
                    'name' => $request->name,
                    'body' => $request->body,
                    'image' => $reqImage ? json_encode($newimage) : $image,
                ]);

                if (!empty($serviceU)) {
                    DB::commit();
                    return redirect()->route('admin.service.index')->with('success','Service Created successfully!');
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
            Service::query()->FindID($id)->delete();
            return redirect()->route('admin.service.index')->with('success','Service Delete successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}

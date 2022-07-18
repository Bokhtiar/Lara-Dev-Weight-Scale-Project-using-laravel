<?php

namespace App\Http\Controllers;

use App\Models\RequestWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestDriver($id)
    {
        $req = new RequestWork();
        $req->user_id = Auth::id();
        $req->driver_id = $id;
        $req->save();
        return back();
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestWork()
    {
        if(Auth::user()->role_id == 2){
            $works = RequestWork::where('user_id', Auth::id())->where('driver_status', 1)->get();
            return view('modules.work.list', compact('works'));
        }elseif(Auth::user()->role_id == 3){
            $works = RequestWork::where('driver_id', Auth::id())->get();
            return view('modules.work.list', compact('works'));
        }elseif(Auth::user()->role_id == 4){
            $works = RequestWork::where('driver_id', Auth::id())->get();
            return view('modules.work.list', compact('works'));
        }else{
            dd('5');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function driverAccept($id)
    {
        $model = RequestWork::find($id);
        if($model->driver_status == 0){
            $model->driver_status = 1;
            $model->save();
            return back();
        }else{
            $model->driver_status = 0;
            $model->save();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function workStore(Request $request, $id)
    {
        $work = RequestWork::find($id);
        $work->body = $request->body;
        $work->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userget($id)
    {
        $model = RequestWork::find($id);
        if($model->user_status == 0){
            $model->user_status = 1;
            $model->save();
            return back();
        }else{
            $model->user_status = 0;
            $model->save();
            return back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

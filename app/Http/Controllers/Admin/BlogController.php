<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Blog::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $image = Blog::query()->Image($request);
                $blog = Blog::create([
                    'title' => $request->title,
                    'body' => $request->body,
                    'image' => json_encode($image)
                ]);

                if (!empty($blog)) {
                    DB::commit();
                    return redirect()->route('admin.blog.index')->with('success','Blog Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $show = Blog::find($id);
            return view('admin.blog.show', compact('show'));
        } catch (\Throwable $th) {
            //throw $th;
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
            $edit = Blog::find($id);
            return view('admin.blog.createOrUpdate', compact('edit'));
        } catch (\Throwable $th) {
            //throw $th;
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
        $validated = Blog::query()->Validation($request->all());
        if($validated){
            try{
                $update = Blog::find($id);
                DB::beginTransaction();
                $reqImage = $request->image;
                if($reqImage){
                    $newimage = Blog::query()->Image($request);
                }else{
                    $image = $update->image;
                }

                $blogU = $update->update([
                    'title' => $request->title,
                    'body' => $request->body,
                    'image' => $reqImage ? json_encode($newimage) : $image,
                ]);

                if (!empty($blogU)) {
                    DB::commit();
                    return redirect()->route('admin.blog.index')->with('success','blog Created successfully!');
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
            Blog::find($id)->delete();
            return redirect()->route('admin.blog.index')->with('success', 'Blog Deleted Successfully..!');
        } catch (\Throwable $th) {
            return $th;
        }
    }
}

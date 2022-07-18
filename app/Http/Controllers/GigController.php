<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $gigs = Gig::where('user_id', Auth::id())
                ->get(['title', 'body', 'gig_id']);
            return view('modules.gig.createOrUpdate', compact('gigs'));
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
        try {
            $gigs = Gig::where('user_id', Auth::id())
                ->get(['title', 'body', 'gig_id']);
            return view('modules.gig.createOrUpdate', compact('gigs'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = Gig::query()->Validation($request->all());

        if ($validated) {
            try {
                DB::beginTransaction();
                $gig = Gig::create([
                    'title' => $request->title,
                    'user_id' => Auth::id(),
                    'body' => $request->body,
                ]);

                if (!empty($gig)) {
                    DB::commit();
                    return redirect()->route('git.create')->with('success', 'Gig Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            } catch (\Exception $ex) {
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
            $edit = Gig::find($id);
            $gigs = Gig::where('user_id', Auth::id())
                ->get(['title', 'body', 'gig_id']);
            return view('modules.gig.createOrUpdate', compact('gigs', 'edit'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
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
        $validated = Gig::query()->Validation($request->all());

        if ($validated) {
            try {
                DB::beginTransaction();
                $gig = Gig::find($id);
                $gigU = $gig->update([
                    'title' => $request->title,
                    'user_id' => Auth::id(),
                    'body' => $request->body,
                ]);

                if (!empty($gigU)) {
                    DB::commit();
                    return redirect()->route('git.create')->with('success', 'Gig Updated successfully!');
                }
                throw new \Exception('Invalid About Information');
            } catch (\Exception $ex) {
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
            Gig::find($id)->delete();
            return back()->with('success', 'Deleted Successfully');
        } catch (\Throwable $th) {
            return back()->withError($th->getMessage());
        }
    }
}

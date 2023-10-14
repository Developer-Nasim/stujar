<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     //   dd($request);
        $content= About::findOrfail($id);
        $content->user_id = $request->user_id;
        $content->slug = $request->slug;
        $content->about = $request->about;
        $content->total_student =  $request->total_student;
        $content->total_teacher = $request->total_teacher;
        $content->total_stuff = $request->total_stuff;
        $content->status = 1;
        if($content->save()){
            return redirect('user/school',)->with('success','Successfully created School '); 
        }
        else{
            dd('not ok');
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

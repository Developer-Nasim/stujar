<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Upload;
use App\Models\User;
use Auth;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $contents = Content::where('content_type' , 'committee')->with(['upload','employee','content_employee'])->get();
        return view('admin.committee.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.committee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $content = new Content;
        $content->content_type = 'committee';
        $content->user_id = Auth::user()->id;
        $content->name = $request->name;
        $content->slug = $request->slug;
        $content->status = $request->status;    
           
        if($content->save()){
            $upload = new Upload;
            $upload->user_id= $content->user_id;
            $upload->content_id= $content->id;
            $upload->name= 'committee';
            $upload->url=  $request->url;
            $upload->caption=  $request->caption;
            $upload->status= $content->status;
            $upload->save();
            return redirect('admin/committee');
        }
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
        $contents= Content::findOrfail($id);
        return view('admin.committee.edit',compact('contents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //  dd($request->all());
         $content= Content::findOrfail($id);
         $content->user_id = Auth::user()->id;
         $content->name = $request->name;
         $content->slug = $request->slug;
         $content->status = $request->status;    
            
         if($content->save()){
             $upload = Upload::where('content_id',$content->id)->first();
            // dd($upload);
             $upload->user_id= $content->user_id;
             $upload->name= 'committee';
             $upload->caption=  $request->caption;
             $upload->url=  $request->url;
             $upload->status= $content->status;
             $upload->save();
             return redirect('admin/committee');
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content= Content::findOrfail($id);
        $content->status = 3;
        $content->update();    
        return redirect()->back();
    }
}

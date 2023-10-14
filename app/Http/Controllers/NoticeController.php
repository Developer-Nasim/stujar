<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use Auth;
use App\Models\Siteoption;
use App\Models\App;
use Intervention\Image\Facades\Image;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $contents = Content::where('content_type' , 'notice' )->orderBy('id','desc')->with('upload')->get();
        // return view('admin.notice.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request);
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $content = new Notice;
        $content->name = $request->name;
        $content->user_id = $request->user_id;
        $content->slug = $request->slug;
        $content->message = $request->message;
        $content->status = 1;
        if($content->save()){
            return redirect('user/school')->with('success','Successfully created School '); 
        }
        else{
            dd('not ok');
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
        $notice = Notice::find($id);
        $websettings = $this->getWebSettings();
        return view('notice.edit',compact('notice','websettings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $content= Notice::findOrfail($id); 
        $content->name = $request->name;
        $content->message = $request->message;
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
        $content= Notice::findOrfail($id);
        $content->delete();    
        return redirect()->back();
    }
    public function getWebSettings(){
        $siteoptions = Siteoption::select('okey','ovalue')->get()->toArray();
        $websettings = [];
        foreach($siteoptions as $key => $value){
            $websettings[$value['okey']] = $value['ovalue'];
        }
        return $websettings;
    }
}

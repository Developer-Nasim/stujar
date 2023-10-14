<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Event;
use App\Models\ContentEmployee;

class ContentController extends Controller
{
    
    public function about_us(){
        //dd('about_us');
        // $contents = Content::where('slug' , 'about-us' )->where('status', 1)->first();
       // dd($contents);
        return view('frontend.about-us.aboutus');
    }
    public function gallery(){
        $contents = Content::where('content_type' , 'gallery')->where('status', 1)->with('upload')->get();
        return view('frontend.gallery.gallery',compact('contents'));
    }
    public function gallery_details($id){
        $content= Content::where('content_type' , 'gallery')->where('status', 1)->where('id', $id)->with('upload')->first();
        return view('frontend.gallery.gallery_details',compact('content'));
    }
    public function news(){
        $contents = Content::where('content_type' , 'blog')->where('status', 1)->with('upload')->get();
        //dd($contents);
        return view('frontend.news.news',compact('contents'));
    }
    public function news_details($id){
        $content= Content::where('content_type' , 'blog')->where('status', 1)->where('id', $id)->with('upload')->first();
       // dd($content);
        return view('frontend.news.news_details',compact('content'));
    }
    public function event(){
        $events = Event::where('status', 1)->get();
        return view('frontend.events.event',compact('events'));
    }
    public function event_details($id){
        $event= Event::where('status', 1)->where('id', $id)->first();
       // dd($event);
        return view('frontend.events.event_details',compact('event'));
    }
    public function notice(){
        $contents = Content::where('content_type' , 'notice')->where('status', 1)->with('upload')->get();
        return view('frontend.notice.notice',compact('contents'));
    }
    public function notices_details($id){
        $content= Content::where('content_type' , 'notice')->where('status', 1)->where('id', $id)->with('upload')->first();
        return view('frontend.notice.notice_details',compact('content'));
    }

    public function committee_employee( Request $request, string $employee_id,$content_id){
     //   dd($id);
        ContentEmployee::where('employee_id',$employee_id)->where('content_id',$content_id)->delete();
        return redirect()->back();
    }

}

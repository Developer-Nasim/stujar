<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Welcome;
use App\Models\Content;
use App\Models\Siteoption;
use App\Models\Landing;
use App\Models\Pagesetting;
use App\Models\Employee;
use App\Models\Event;
use App\Models\Member;
use App\Models\Tag;
use App\Models\ContentEmployee;


class HomeController extends Controller
{
    public function home(){
        $websettings = $this->getWebSettings();
        $pagesetting = $this->getPageSetting('index');
        $welcome= Welcome::select('text_one','text_two')->first();
        $sliders= Content::where('content_type','slider')->where('status',1)->with('upload')->get();
        $committees= Content::where('content_type','committee')->where('status',1)->with('upload')->get();
        $news= Content::where('content_type','news')->where('status',1)->with('upload')->get();
        $blogs= Content::where('content_type','blog')->where('status',1)->with('upload')->get();
        $notices= Content::where('content_type','notice')->where('status',1)->with('upload')->get();
        return view('welcome',compact('welcome','sliders','committees','blogs','notices','websettings','pagesetting','tags','news'));
    }

    public function landing($pagelink = null){
        $requested = request()->all();
        
        // get website global settings
        $websettings = $this->getWebSettings();
        $tags = $this->getWebMenus();
        $footermenu = $this->getfooterMenus();
        if(!empty($requested['member_search'])){
            // $search_name = $requested['member_name'];
            // $search_floor= $requested['member_floor'];
            $pagesetting = $this->getPageSetting($pagelink);
            $member_name = $member_floor = '';
            if(!empty($requested['member_name'])){
                $member_name = $requested['member_name'];
            }
            if(!empty($requested['member_floor'])){
                $member_floor = $requested['member_floor'];
            }
            $members = Member::select('id','title','slug','logo','businessAddress','mobile','email','companyWebsite')
                        ->where(function ($query) use ($member_name,$member_floor) {
                            //member name requested
                            if(!empty($member_name)){$query->where('title', 'like', "%{$member_name}%");}
                            //member floor requested
                            if(!empty($member_floor)){$query->where('floorCentral', '=', $member_floor);}
                        })            
                        ->where('status',1)
                        ->with('Employee','Branch')
                        
                        ->paginate(12)->withQueryString();
            $members->appends(['member_name' => $member_name,'member_floor'=>$member_floor]);
            return view($websettings['cms_layout'].'.allmember',compact('members','websettings','pagesetting','tags','footermenu','member_name','member_floor'));
        }
        
     
        if(empty($pagelink)){
            $pagesetting = $this->getPageSetting('index');
            $welcome= Welcome::select('text_one','text_two','welcome_ticker','status')->where('status', 1)->first();
            $sliders= Content::where('content_type','slider')->where('status',1)->with('upload')->get();
            $committees = Content::where('content_type','committee')->where('status',1)->with('upload')->get();
            $blogs= Content::where('content_type','blog')->where('status',1)->orderBy('id','desc')
            ->with('upload')->take(3)->get();
            $services = Content::where('content_type','service')->where('status',1)->orderBy('id','desc')
            ->with('upload')->take(6)->get();
            $products = Content::where('content_type','product')->where('status',1)->orderBy('id','desc')
            ->with('upload')->take(6)->get();
            $news= Content::where('content_type','news')->where('status',1)->orderBy('id','desc')->with('upload')->take(3)->get();
            $notices = Content::where('content_type','notice')->where('status',1)->orderBy('id','desc')->with('upload')->take($websettings['cms_hnc'])->get();
            $gallery = Content::where('content_type' , 'gallery')->where('status', 1)->orderBy('id','desc')->with('upload')->take(4)->get();
            $videos = Content::where('content_type' , 'video')->where('status', 1)->orderBy('id','desc')->with('upload')->take(4)->get();
            $upcomingEvents= Event::where('event_type', 'upcoming')->where('status', 1)->orderBy('id','desc')->take(2)->get();
            $currentEvents= Event::where('event_type', 'current')->where('status', 1)->orderBy('id','desc')->take(2)->get();
            $pastEvents= Event::where('event_type', 'past')->where('status', 1)->orderBy('id','desc')->take(2)->get();
            $singlecommittee = Content::where('content_type' , 'committee' )->with(['upload','employee','content_employee'])->where('status', 1)->first();
            $home_about = Content::where('slug' ,'about' )->where('status',1)->with('upload')->first();
            
            $home_ceo = Content::where('slug' ,'about-ceo' )->where('status',1)->with('upload')->first();
            
            if(!empty($websettings['cms_home_buy_from_us'])){
                $home_buy_from_us = Content::where('slug' ,'why-buy-from-us' )->where('status',1)->with('upload')->first();
            }else{
                $home_buy_from_us = '';
            }
            
            return view($websettings['cms_layout'].'.index',compact('websettings','pagesetting','welcome','sliders','committees','blogs','notices','gallery','tags','news','videos','upcomingEvents','currentEvents','pastEvents','singlecommittee','home_about','home_buy_from_us','footermenu','services','products','home_ceo'));
        }

        $landing = Landing::where('pagelink',$pagelink)->first();
        // dd($landing);
        // if there is landing, the page exists or created
        if(!empty($landing)){
            // if the link has been redirected, redirect the new link
            if(!empty($landing->nextpagelink)){
                // landing page has a redirect or next page link, then redirect to new landing
                return redirect()->action([HomeController::class, 'landing'],$landing->nextpagelink);
            }elseif($landing->statuscode == 200){
                // the page should have a valid response
                // check the link type and set data source
                // dd($landing);
                switch($landing->linktype){
                    case ('content'):
                        // play your content logic here
                        $content = Content::where('slug',$pagelink)->first();
                        return view($websettings['cms_layout'].'.content',compact('content','websettings','tags','footermenu'));
                        break;
                    case ('event'):
                        $event= Event::where('slug' ,$pagelink)->where('status', 1)->first();
                        return view($websettings['cms_layout'].'.eventDetails',compact('event','websettings','tags','footermenu'));
                        break;
                    case ('member'):
                        $member = Member::where('slug' ,$pagelink)
                                        ->where('status',1)
                                        ->with('Employee','Branch')
                                        ->first();
                                        // dd($member);
                         $member_gallery = Content::where('user_id',$member->user_id)->where('content_type','member_gallery')->with('upload')->first();
                         $member_offer = Content::where('user_id',$member->user_id)->where('content_type','member_offer')->with('upload')->first();
                         $member_product = Content::where('user_id',$member->user_id)->where('content_type','member_product')->with('upload')->first();
                        return view($websettings['cms_layout'].'.memberDetails',compact('member','websettings','tags','member_gallery','member_offer','member_product','footermenu'));
                        break;
                    case ('news'):
                        $content = Content::where('slug' ,$pagelink)->where('status',1)->with('upload')->first();
                        $contents = Content::where('content_type','news')->where('status',1)->with('upload')->orderBy('id','DESC')->whereNotIn('id', [$content->id])->take(10)->get();
                        return view($websettings['cms_layout'].'.newsDetails',compact('contents','content','websettings','tags','footermenu'));
                        break;
                    // case ('press'):
                    //     $content = Content::where('slug' ,$pagelink)->where('status',1)->with('upload')->first();
                    //     return view($websettings['cms_layout'].'.pressDetails',compact('content','websettings','tags'));
                    //     break;
                    case ('blog'):
                        $content = Content::where('slug' ,$pagelink)->where('status',1)->with([
                            'upload' => function($q) {
                                $q->where('status', '=', 1);
                            },
                            'comment' => function($q) {
                                $q->where('status', '=', 1);
                                $q->orderBy('id', 'DESC');
                            }
                        ])->first();
                        $contents = Content::where('content_type','blog')->where('status',1)->with('upload')->orderBy('id','DESC')->whereNotIn('id', [$content->id])->take(10)->get();
                        return view($websettings['cms_layout'].'.blogDetails',compact('contents','content','websettings','tags','footermenu'));
                        break;
                    case ('product'):
                        $content = Content::where('slug' ,$pagelink)->where('status',1)->with([
                            'upload' => function($q) {
                                $q->where('status', '=', 1);
                            },
                            'comment' => function($q) {
                                $q->where('status', '=', 1);
                                $q->orderBy('id', 'DESC');
                            }
                        ])->first();
                        // dd('ol');
                        $contents = Content::where('content_type','product')->where('status',1)->with('upload')->orderBy('id','DESC')->whereNotIn('id', [$content->id])->take(10)->get();
                        return view($websettings['cms_layout'].'.productDetails',compact('contents','content','websettings','tags','footermenu'));
                        break;
                    case ('service'):
                        // dd('ok');
                        $content = Content::where('slug' ,$pagelink)->where('status',1)->with([
                            'upload' => function($q) {
                                $q->where('status', '=', 1);
                            },
                            'comment' => function($q) {
                                $q->where('status', '=', 1);
                                $q->orderBy('id', 'DESC');
                            }
                        ])->first();
                        // dd('ol');
                        $contents = Content::where('content_type','service')->where('status',1)->with('upload')->orderBy('id','DESC')->whereNotIn('id', [$content->id])->take(10)->get();
                        return view($websettings['cms_layout'].'.productDetails',compact('contents','content','websettings','tags','footermenu'));
                        break;
                    case ('notice'):
                        $content= Content::where('slug' ,$pagelink)->where('status', 1)->with('upload')->first();
                        $notices = Content::where('content_type','notice')->where('status',1)->orderBy('id','desc')->with('upload')->take(10)->get();
                        return view($websettings['cms_layout'].'.noticeDetails',compact('content','websettings','tags','footermenu','notices'));
                        break;
                    case ('gallery'):
                        $content= Content::where('content_type' , 'gallery')->where('status', 1)->where('slug' ,$pagelink)->with('upload')->first();
                        return view($websettings['cms_layout'].'.galleryDetails',compact('content','websettings','tags','footermenu'));
                        break;
                    case ('video'):
                        $content= Content::where('content_type' , 'video')->where('status', 1)->where('slug' ,$pagelink)->with('upload')->first();
                        return view($websettings['cms_layout'].'.videoDetails',compact('content','websettings','tags','footermenu'));
                        break;
                    case ('page'):
                        $content= Content::where('content_type' , 'page')->where('status', 1)->where('slug' ,$pagelink)->with('upload')->first();
                        return view($websettings['cms_layout'].'.pageDetails',compact('content','websettings','tags','footermenu'));
                        break;
                    case ('employee'):
                        $singlecommittee = Content::where('content_type' , 'committee' )->with(['upload','employee','content_employee'])->where('status', 1)->first();
                        $employee = Employee::where('status', 1)->where('slug' ,$pagelink)->with('member','content')->first();
                        $content_employee = ContentEmployee::where('employee_id', $employee->id)->where('content_id', $employee->content[0]['id'])->first();
                        $employee_post = $content_employee->post;
                        return view($websettings['cms_layout'].'.employeeDetails',compact('employee','websettings','tags','footermenu','employee_post','singlecommittee'));
                        break;
                    case ('landing'):
                        // play your shop logic here
                        $pagesetting = $this->getPageSetting($pagelink);
                        if($pagelink =='events'){
                            $events = Event::where('status', 1)->orderBy('id','desc')->paginate(12);
                            return view($websettings['cms_layout'].'.allEvents',compact('events','websettings','pagesetting','tags','footermenu'));
                        }
                        elseif($pagelink =='about-us'){
                            $home_about = Content::where('slug' ,'about' )->where('status',1)->with('upload')->first();
                            if(!empty($websettings['cms_home_buy_from_us'])){
                                $home_buy_from_us = Content::where('slug' ,'why-buy-from-us' )->where('status',1)->with('upload')->first();
                            }else{
                                $home_buy_from_us = '';
                            }
                            $pages = Content::where('content_type' , 'page')->whereIn('slug', ['mission','our-values','vision','message-from-chariman'])->where('status', 1)->with('upload')->orderBy('id','ASC')->get();
                            $content = Content::where('content_type' , 'page')->where('slug', 'about')->where('status', 1)->with('upload')->orderBy('id','desc')->first();
                            return view($websettings['cms_layout'].'.aboutus',compact('websettings','tags','pagesetting','footermenu','pages','content','home_buy_from_us','home_about'));
                        }
                        elseif($pagelink =='news'){
                            $contents = Content::where('content_type' , 'news')->where('status', 1)->with('upload')->orderBy('id','desc')->paginate(12);
                            return view($websettings['cms_layout'].'.allNews',compact('contents','websettings','pagesetting','tags','footermenu'));
                        }
                        elseif($pagelink =='press-release'){
                            $contents = Content::where('content_type' , 'press' )->where('status',1)->with(['Upload'])->orderBy('id','desc')->paginate(12);
                            return view($websettings['cms_layout'].'.pressAll',compact('contents','websettings','pagesetting','tags','footermenu'));
                        }
                        elseif($pagelink =='blog'){
                            $contents = Content::where('content_type' , 'blog')->where('status', 1)->with('upload')->orderBy('id','desc')->paginate(12);
                            return view($websettings['cms_layout'].'.allBlog',compact('contents','websettings','pagesetting','tags','footermenu'));
                        }
                        elseif($pagelink =='products'){
                            $contents = Content::where('content_type' , 'product')->where('status', 1)->with('upload')->orderBy('id','desc')->paginate(12);
                            return view($websettings['cms_layout'].'.allProduct',compact('contents','websettings','pagesetting','tags','footermenu'));
                        }
                        elseif($pagelink =='services'){
                            $contents = Content::where('content_type' , 'service')->where('status', 1)->with('upload')->orderBy('id','desc')->paginate(12);
                            return view($websettings['cms_layout'].'.allService',compact('contents','websettings','pagesetting','tags','footermenu'));
                        }
                        elseif($pagelink =='members'){
                            $member_name = $member_floor = '';
                            if(!empty($requested['member_name'])){
                                $member_name = $requested['member_name'];
                            }
                            if(!empty($requested['member_floor'])){
                                $member_floor = $requested['member_floor'];
                            }
                            $members = Member::select('id','title','slug','logo','businessAddress','mobile','email','companyWebsite')
                                        ->where(function ($query) use ($member_name,$member_floor) {
                                            //member name requested
                                            if(!empty($member_name)){$query->where('title', 'like', "%{$member_name}%");}
                                            //member floor requested
                                            if(!empty($member_floor)){$query->where('floorCentral', '=', $member_floor);}
                                        })            
                                        ->where('status',1)
                                        ->with('Employee','Branch')
                                        ->paginate(12);
                            return view($websettings['cms_layout'].'.allmember',compact('members','websettings','pagesetting','tags','footermenu'));
                        }

                        elseif($pagelink =='notice'){
                            $notice = Content::where('content_type' , 'notice')->where('status', 1)->with('upload')->orderBy('id','desc')->paginate(12);
                            return view($websettings['cms_layout'].'.noticeAll',compact('notice','websettings','tags','pagesetting','footermenu'));
                        }
                        elseif($pagelink =='gallery'){
                            $contents = Content::where('content_type' , 'gallery')->where('status', 1)->with('upload')->orderBy('id','desc')->paginate(12);
                            return view($websettings['cms_layout'].'.galleryAll',compact('contents','websettings','tags','pagesetting','footermenu'));
                        }
                        elseif($pagelink =='committee'){
                            $singlecommittee = Content::where('content_type' , 'committee' )->with(['upload','employee','content_employee'])->where('status', 1)->first();
                            return view($websettings['cms_layout'].'.committeeALl',compact('singlecommittee','websettings','tags','pagesetting','footermenu'));
                        }
                        elseif($pagelink =='contact'){
                            return view($websettings['cms_layout'].'.contact',compact('websettings','tags','pagesetting','footermenu'));
                        }
                        elseif($pagelink =='get-a-quotation'){
                            return view($websettings['cms_layout'].'.quotation',compact('websettings','tags','pagesetting','footermenu'));
                        }
                        elseif($pagelink =='videos'){
                            $contents = Content::where('content_type' , 'video')->where('status', 1)->with('upload')->paginate(12);
                            return view($websettings['cms_layout'].'.videoAll',compact('contents','websettings','tags','pagesetting','footermenu'));
                        }
                        break;
                    default:
                    // play your default logic here
                }
            }
        }else{
            // requested pagelink not found on landing page collection
            return redirect('/four-zero-four');
        }
    }
    public function getPageSetting($pageSlug = null){
        $pagesetting = Pagesetting::where('meta_slug',$pageSlug)->first();
        return $pagesetting;
    }
    
    public function getWebSettings(){
        $siteoptions = Siteoption::select('okey','ovalue')->get()->toArray();
        $websettings = [];
        foreach($siteoptions as $key => $value){
            $websettings[$value['okey']] = $value['ovalue'];
        }
        return $websettings;
    }
    public function member_login(){
        return view('frontend.member.login');
    }
    public function getWebMenus(){
        $tags = Tag::where('status', 1)
                ->where('tag_type',1)
                ->orderBy('sequence','ASC')
                ->orderBy('id','DESC')
                ->get();    
        return $tags;
    }
    public function getfooterMenus(){
        $footermenu = Tag::where('status', 1)
                ->where('tag_type',2)
                ->orderBy('sequence','ASC')
                ->orderBy('id','DESC')
                ->get();    
        return $footermenu;
    }
}

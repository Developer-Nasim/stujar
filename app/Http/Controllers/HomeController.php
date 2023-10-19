<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Siteoption;
use App\Models\Landing;
use App\Models\Pagesetting;
use App\Models\Tag;
use App\Models\School;


class HomeController extends Controller
{


    public function landing($pagelink = null){
        $requested = request()->all();
        
        // get website global settings
        $websettings = $this->getWebSettings();
        $tags = $this->getWebMenus();
        $footermenu = $this->getfooterMenus();
        if(empty($pagelink)){
            $pagesetting = $this->getPageSetting('index');      
            $schools = School::where('status',1)->take(3)->get();
            return view($websettings['cms_layout'].'.index',compact('websettings','pagesetting','tags','footermenu','schools'));
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

                    case ('landing'):
                        // play your shop logic here
                        $pagesetting = $this->getPageSetting($pagelink);
                        if($pagelink =='contact'){
                            return view($websettings['cms_layout'].'.contact',compact('websettings','tags','pagesetting','footermenu'));
                        }
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
    public function privacy_policy(){
        $websettings = $this->getWebSettings();
        $tags = $this->getWebMenus();
        $footermenu = $this->getfooterMenus();
        return view('sa.privacypolicy',compact('websettings','tags','footermenu')); 
    }
    public function terms(){
        $websettings = $this->getWebSettings();
        $tags = $this->getWebMenus();
        $footermenu = $this->getfooterMenus();
        return view('sa.termsofservice',compact('websettings','tags','footermenu')); 
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

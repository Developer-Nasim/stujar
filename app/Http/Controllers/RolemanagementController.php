<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Siteoption;
use App\Models\User;
use Auth;
use App\Models\Member;
use App\Models\Content;
use App\Models\Employee;
use App\Models\Branch;

class RolemanagementController extends Controller
{
    public function company_profile(){
        $tags = $this->getWebMenus();
        $websettings = $this->getWebSettings();
       return view('frontend.role.company_profile',compact('tags','websettings'));
    }
    public function company_gallery(){
        $tags = $this->getWebMenus();
        $websettings = $this->getWebSettings();
       return view('frontend.role.company_gallery',compact('tags','websettings'));
    }
    public function company_offer(){
        $tags = $this->getWebMenus();
        $websettings = $this->getWebSettings();
       return view('frontend.role.company_offer',compact('tags','websettings'));
    }
    public function company_employee(){
        $tags = $this->getWebMenus();
        $websettings = $this->getWebSettings();
       return view('frontend.role.company_employee',compact('tags','websettings'));
    }
    public function company_branch(){
        $tags = $this->getWebMenus();
        $websettings = $this->getWebSettings();
       return view('frontend.role.company_branch',compact('tags','websettings'));
    }
    public function company_product(){
        $tags = $this->getWebMenus();
        $websettings = $this->getWebSettings();
       return view('frontend.role.company_product',compact('tags','websettings'));
    }
    public function company_service(){
        $tags = $this->getWebMenus();
        $websettings = $this->getWebSettings();
       return view('frontend.role.company_service',compact('tags','websettings'));
    }
    public function getWebMenus(){
        $tags = Tag::where('status', 1)->orderBy('sequence','ASC')->orderBy('id','DESC')->get();
        return $tags;
    }
    public function getWebSettings(){
        $siteoptions = Siteoption::select('okey','ovalue')->get()->toArray();
        $websettings = [];
        foreach($siteoptions as $key => $value){
            $websettings[$value['okey']] = $value['ovalue'];
        }
        return $websettings;
    }

    public function member_edit()
    {
        $user_id= Auth::user()->id;
       // dd($user_id);
        $member = Member::where('user_id',$user_id)->with('Employee','Branch','Content')->first();
        $gallery = Content::where('user_id',$user_id)->where('content_type','member_gallery')->with('upload')->first();
        $offer = Content::where('user_id',$user_id)->where('content_type','member_offer')->with('upload')->first();
       // dd($gallery);
        if(empty($member->id)){
            // create a new company here
            $member = new Member;
            $member->user_id = $user_id;
            $member->created_by = Auth::user()->id;
            $member->title = "Company name";
            $member->slug = "company-slug-".time();            ;
            $member->status = 3;
            $result = (new LandingController)->generateLanding('member',404,$member->slug);
            if($result == 2){
                if($member->save()){
                    $member = Member::where('user_id',$user_id)->with(
                        'Employee','Branch','Content'
                    )->first();
                } 
            }
        }
      //  dd($member);
        return view('member.company_info_edit',compact('member','gallery','offer'));
    }
    public function employee_add()
    {
        $websettings = $this->getWebSettings();
        $user_id= Auth::user()->id;
        // dd($user_id);
        $employee= Employee::where('user_id',$user_id)->first();
        // dd($employee);
        $member = Member::where('user_id',$user_id)->with('Employee','Branch','Content')->first();
      //  dd($member);
        if(empty($employee->name)){
            $employee = new Employee;
            $employee->member_id = $member->id;
            $employee->user_id =  $user_id;
            $employee->created_by = Auth::user()->id;
            $employee->name = "representative Name of Company";
            $employee->slug = "representative-slug-".time();
            $employee->status = 1;
            $employee->save();
        }
        return view('member.employee_add',compact('employee','websettings','member'));
    }
    
    public function branch_add()
    {
        $user_id= Auth::user()->id;
       //dd($user_id);
       $member = Member::where('user_id',$user_id)->with('Employee','Branch','Content')->first();
       return view('member.branch_add',compact('member'));
    }
    public function branch_edit()
    {
        $user_id= Auth::user()->id;
       //dd($user_id);
       $branch= Branch::where('user_id',$user_id)->first();
       $member = Member::where('user_id',$user_id)->with('Employee','Branch','Content')->first();
        return view('member.branch_edit',compact('member','branch'));
    }
    public function branch_delete($id){
      // dd($id);
        $branch= Branch::findOrfail($id)->delete(); 
        return redirect()->back();
    }
    public function member_gallery()
    {
        $websettings = $this->getWebSettings();
        $user_id= Auth::user()->id;
        //dd($user_id);
        $member = Member::where('user_id',$user_id)->with('Employee','Branch','Content')->first();
        $gallery = Content::where('user_id',$user_id)->where('content_type','member_gallery')->with('upload')->first();
        if(empty($gallery->name)){
            $gallery = new Content;
            $gallery->content_type = 'member_gallery';
            $gallery->user_id = $member->user_id;
            $gallery->member_id = $member->id;
            $gallery->name = "Member Gallery of ".$member->title;
            $gallery->slug = "members-gallery-slug-".time();
            $gallery->status = 1;
            $gallery->save();
        }
        return view('member.member_gallery',compact('member','gallery','websettings'));
    }
    public function member_offer()
    {
       $websettings = $this->getWebSettings();
       $user_id= Auth::user()->id;
       //dd($user_id);
       $member = Member::where('user_id',$user_id)->with('Employee','Branch','Content')->first();
       $offer = Content::where('user_id',$user_id)->where('content_type','member_offer')->with('upload')->first();
        // dd($offer);
        if(empty($offer->name)){
            $offer = new Content;
            $offer->content_type = 'member_offer';
            $offer->user_id = $member->user_id;
            $offer->member_id = $member->id;
            $offer->name = "Offer by ".$member->title;
            $offer->slug = "members-offer-slug-".time();
            $offer->status = 1;
            $offer->save();
        }
      //dd($offer);
        return view('member.member_offer',compact('member','offer','websettings'));
    }
    public function member_product()
    {
       $websettings = $this->getWebSettings();
       $user_id= Auth::user()->id;
       //dd($user_id);
       $member = Member::where('user_id',$user_id)->with('Employee','Branch','Content')->first();
       $product = Content::where('user_id',$user_id)->where('content_type','member_product')->with('upload')->first();
       // dd($product);
       if(empty($product->name)){
           $product = new Content;
           $product->content_type = 'member_product';
           $product->user_id = $member->user_id;
           $product->member_id = $member->id;
           $product->name = "product by ".$member->title;
           $product->slug = "members-product-slug-".time();
           $product->status = 1;
           $product->save();
       }
        return view('member.member_product',compact('member','product','websettings'));
    }
    public function member_service()
    {
       $websettings = $this->getWebSettings();
       $user_id= Auth::user()->id;
       //dd($user_id);
       $member = Member::where('user_id',$user_id)->with('Employee','Branch','Content')->first();
       $service = Content::where('user_id',$user_id)->where('content_type','member_service')->with('upload')->first();
       // dd($service);
       if(empty($service->name)){
           $service = new Content;
           $service->content_type = 'member_product';
           $service->user_id = $member->user_id;
           $service->member_id = $member->id;
           $service->name = "service by ".$member->title;
           $service->slug = "members-service-slug-".time();
           $service->status = 1;
           $service->save();
       }
    return view('member.member_service',compact('member','service','websettings'));
    }
    
}

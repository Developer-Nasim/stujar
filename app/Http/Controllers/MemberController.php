<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Content;
use App\Models\Upload;
use App\Models\User;
use App\Models\Siteoption;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $search = $request->name;
        $members = User::where('role_id',7)->where('name', 'like', "%{$search}%")->orderBy('id','desc')->paginate(20);
        return view('admin.member.index',compact('members','search'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = User::where('role_id',7)->orderBy('id','desc')->paginate(20);
        return view('admin.member.index',compact('members'));
    }
    public function getWebSettings(){
        $siteoptions = Siteoption::select('okey','ovalue')->get()->toArray();
        $websettings = [];
        foreach($siteoptions as $key => $value){
            $websettings[$value['okey']] = $value['ovalue'];
        }
        return $websettings;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function company($action,$user_id)
    {
        $websettings = $this->getWebSettings();
        // dd($websettings);
        // find or create a member
        $member = Member::where('user_id',$user_id)->with('Employee','Branch','Content')->first();
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

        // find or create a gallery
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

        // find or create a offer
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

        // find or create a product
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

        // find or create a product
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
        // dd($gallery);
        return view('admin.member.'.$action,compact('websettings','member','gallery','offer','product','service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pagesetting.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->formtype) && $request->formtype == 'shop'){
            dd($request);
        }
        elseif(!empty($request->formtype) && $request->formtype == 'user'){
            // User::create([
            //     'name' => $request['name'],
            //     'email' => $request['email'],
            //     'role_id' => 7,
            //     'password' => Hash::make($request['password']),
            // ]);

        $id = User::insertGetId([
            'name' => $request['name'],
            'email' => $request['email'],
            'role_id' => 7,
            'password' => Hash::make($request['password']),    
            ]);
          //  dd($id);      
        }  
         // create a new company here         
            $member = new Member;
            $member->user_id = $id;
            $member->created_by = Auth::user()->id;
            $member->title = "Company name";
            $member->slug = "company-slug-".time();            ;
            $member->status = 1;
            $result = (new LandingController)->generateLanding('member',404,$member->slug);
            if($result == 2){
                if($member->save()){
                    $member = Member::where('user_id',$id)->with(
                        'Employee','Branch','Content'
                    )->first();
                } 
            }    
        return redirect('admin/member');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pagesetting = Pagesetting::findOrfail($id);
        return view('admin.pagesetting.edit',compact('pagesetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $member = Member::findOrfail($id);
        // dd($request);
        $member->title = $request->title;
        $member->slug = $request->slug;
        $member->subtitle = $request->subtitle;
        // $member->memberSince = $request->memberSince;
        // $member->validTill = $request->validTill;
        $member->aboutCompany = $request->aboutCompany;
        // $member->bcsMemberId = $request->bcsMemberId;
        // $member->companyType = $request->companyType;
        // $member->businessNature = $request->businessNature;
        $member->businessAddress = $request->businessAddress;
        $member->logo = $request->logo;
        $member->establishYear = $request->establishYear;
        $member->floorCentral = $request->floorCentral;
        $member->telephone = $request->telephone;
        $member->mobile = $request->mobile;
        $member->email = $request->email;
        $member->companyWebsite = $request->companyWebsite;
        $member->aboutCompany = $request->aboutCompany;
        $member->googleMap = $request->googleMap;
        $member->shareImage = $request->shareImage;
        $member->socialMedia = json_encode($request->socialMedia);
        $member->metaTitle = $request->metaTitle;
        $member->metaKeywords = $request->metaKeywords;
        $member->metaDescription = $request->metaDescription;
        $member->status = 1;

        // if($request->status == 1){$statusCode = 200;}else{$statusCode = 404;}
        // dd($member);

        if(!empty($request->file['item'])){
            $member->logo = Upload::createSingleUpload($request->file);
        }

        $statusCode = 200;
        if($member->save()){
            if($request->slug != $request->oldslug){
                $result = (new LandingController)->generateLanding('member',$statusCode,$request->slug);
                $result_new = (new LandingController)->addNextLanding('member',301,$request->oldslug,$request->slug);
            }
            $results = (new LandingController)->updateLanding('member',$statusCode,$request->slug);
        }  
        return redirect()->back();
    }

    public function member_company_edit(Request $request, $id){
        dd($id);
    }




}

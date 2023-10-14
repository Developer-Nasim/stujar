<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Comment;
use App\Models\Member;
use App\Models\Content;
use Illuminate\Support\Facades\Session;
use Mail;
use Auth;
use Str;
use Illuminate\Support\Facades\Crypt;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Support\Carbon;



class ContactController extends Controller
{
    public function contact(Request $request){
       return view('frontend.contact.contact');
    }

    // ajax search for members by name
    public function findshop($query){
        $filterResult = Member::where('title', 'LIKE', '%'. $query. '%')->select('title','slug')->get();
        return response()->json($filterResult);
    }
    
    public function comment_store(Request $request){
        // dd($request->all());
        $comment = new Comment([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'status' => 3,
            'description' => $request->message
        ]);
        $content = Content::where('slug',$request->content_url)->where('status',1)->first();
        // dd($content);
        $content->comment()->save($comment);
        return redirect()->back()->with('success', 'Thanks for your valuable comment.');
     }
    public function contact_store(Request $request){

       // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'email'=> 'email:rfc,dns'
        ]);
        $contact = new Contact;
        $contact->contact_type = 'contact_us';
        $contact->sent_by = 8;
        $contact->sent_to = 9;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->status = 1;
        $contact->save();
        $notification=array(
            'message' => 'Email Send.Please Check Your Email',
            'alert-type' => 'success'
        );
       // Session::put('test', 'Thanks for contacting us!');
        return redirect()->back()->with('success', 'Thanks for Contact, We will respose as soon as possible.');
    }
    public function quotation_store(Request $request){

        //dd($request);
       // $encrypted = Crypt::encryptString('Hello world.');
        //dd($encrypted);
        
        $clientIP = request()->ip(); // public IP
       

        $is_verified = Subscribe::where('email',$request->email)->where('is_verified',1)->first();
       
        // EMAIL IS NOT VERIFIED AND SEND CONFIRMATION EMAIL
        if(empty($is_verified)){
            // dd($request);
            $this->saveQuotation($request);
            $is_email_sent = $this->sendConfirmationEmail($request);
            if(!empty($is_email_sent)){
                $notification = "Thanks for asking Quotation, Please Open Email Inbox to Confirm Email Address.";
            }else{
                $notification = "Sorry, Couldn't Sent Email";
            }
            return redirect()->back()->with('success', $notification);
        }
        else{
            // EMAIL IS VERIFIED AND PROCCED TO TESTING ELIGIBILITY TO SEND EMAIL
            $contact = Contact::where('ip_address',$clientIP)->where('created_at', '>=', Carbon::now()->subDay())->get();
            // dd(sizeof($contact));
            if(sizeof($contact)>0){
                // restrict to sending emails
                // notifiy user ur limit reached
                // dd('contact found in 24 hours');
                $succeMessage = "Your Daily Limit has been Reached";
            }else{
                // dd('contact not found in 24 hours');
                $this->saveQuotation($request);
                // dd('saved');
                // send email to shop
                $emailSendToShop = $this->emailSendToAllShop($request);
                $succeMessage = "Thanks for asking Quotation. We Will send email to all BCS Computer City Shop";
            }
            return redirect()->back()->with('success', $succeMessage);
        }
    }

    public function sendConfirmationEmail($request){
        Session::put('name', Crypt::encryptString($request->name));
        Session::put('email', Crypt::encryptString($request->email));
        Session::put('phone', $request->phone);
        Session::put('verification_code', Crypt::encryptString(Str::random(5)));
        $email= $request->email;
        $subject= $request->subject;
        $message_date = [
            'names' =>$request->name,
            'email' => $request->email,
            'subject' =>$request->subject,
            'messages' => $request->message,
        ]; 
        $emailSent = Mail::send('admin.email.mail_template', $message_date, function ($message)use($email,$subject) {
                $message->to($email);
                $message->subject($subject);
            }
        );
        return $emailSent;
    }

    public function saveQuotation($request){
        // dd('req in contact save method',$request);
        $contact = new Contact;
        $clientIP = request()->ip();
        $contact->contact_type = 'quotation';
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->is_verified = 1;
        $contact->ip_address = $clientIP;
        $contact->status = 1;
        $contact->save();
        return true;
    }

    public function emailSendToAllShop($contact){
       // dd('quote send email',$contact);
        $users = User::where('role_id',7)->where('status',1)->take(5)->get();
        $user_list = ['chowdhurypinu1@gmail.com','zahid@startechbd.com','imraihanarifin@gmail.com'];
        $i = 0;
        foreach($users as $user){
            if(!empty($user_list[$i])){
                $email = $user_list[$i];
                $message_date = [
                    'names' =>$contact->name,
                    'email' => $contact->email,
                    'subject' =>$contact->subject,
                    'messages' => $contact->message,
                ];
                Session::put('name', $contact->name);
                Session::put('email', $contact->email);
                Session::put('phone', $contact->phone);
                Session::put('subject', $contact->subject);
                Session::put('message', $contact->message);
                Mail::send('admin.email.mail_template_shop', $message_date, function ($message)use($email) {
                    $message->to($email);
                    $message->subject(Session::get('subject'));
                });
                $i++;
            }
            
        }
        return true;
    }
    public function member_message(Request $request){

       //  dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $contact = new Contact;
        $contact->contact_type = 'message';
        $contact->sent_by = 8;
        $contact->sent_to = $request->member_user_id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->status = $request->status;
        $contact->save();
       // Session::put('test', 'Thanks for contacting us!');
        return redirect()->back()->with('success', 'Thanks for Message us!');
    }
    public function contact_view(){
        $contacts = Contact::orderBy('id','desc')->paginate(20);
        return view('admin.contact.list-contact',compact('contacts'));
    }
    public function contact_quote(){
        $quote = Contact::where('contact_type','quotation')->orderBy('id','desc')->paginate(20);
        return view('admin.contact.list-quote',compact('quote'));
    }
    public function member_msg_view(){
        $member_id = Auth::user()->id;
        // dd($member_id);
        $messages = Contact::where('contact_type', 'message')->where('sent_to', $member_id)->get();
        //dd($contacts);
        return view('member.message_view',compact('messages'));
    }

    //Email Confirmation
    public function confirm_email($code,$email){
        $decryptedCode = Crypt::decryptString($code);
        //dd($decryptedCode);
        $decryptedEmail = Crypt::decryptString($email);
        // dd($decryptedEmail);
        $updateVerified = Contact::where('email',$decryptedEmail)
                                  ->where('verification_code',$decryptedCode)
                                  ->update(['is_verified' => 1]);

        $subscribe = Subscribe::where('email',$decryptedEmail)->first();
        //dd($subscribe);
        if(empty($subscribe)){
            $subscribe = new Subscribe;
            $subscribe->subscribe_type = 'quote';
            $subscribe->email = $decryptedEmail;
            $subscribe->is_verified = 1;
            $subscribe->status = 1;
            $subscribe->save();
            $contactVerified = Contact::where('email',$decryptedEmail)->latest()->first();
            // dd($contactVerified);
            $emailSendToShop = $this->emailSendToAllShop($contactVerified);
            $succeMessage = "Thanks for asking Quotation. We Will send email to all BCS Computer City Shop";    
            return redirect('https://bcscomputercity.org')->with('success', 'You Are Successfully Verified your email and We Will send email to all BCS Computer City Shop. !!!');
        }
        else{
            $updateVerified = Subscribe::where('email',$decryptedEmail)
                                  ->update(['is_verified' => 1]);
            $contactVerified = Contact::where('email',$decryptedEmail)->latest()->first();
            $emailSendToShop = $this->emailSendToAllShop($contactVerified);
            $succeMessage = "Thanks for asking Quotation. We Will send email to all BCS Computer City Shop";   
            return redirect('https://bcscomputercity.org/')->with('success', 'You Are Successfully Verified email and We Will send email to all BCS Computer City Shop. !!!');
        }
    }

}

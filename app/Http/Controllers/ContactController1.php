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
        ]);
        $contact = new Contact;
        $contact->contact_type = 'contact_us';
        $contact->sent_by = 8;
        $contact->sent_to = 9;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->status = $request->status;
        $contact->save();
       // dd($contact->name);
        // Session::put('subject', $request->subject);
        // $name= $contact->name;
        // $email= $contact->email;
        // $subject= $contact->subject;
        // $description= $request->message;
        // $message_date = [
        //     'names' =>$request->name,
        //     'email' => $request->email,
        //     'subject' =>$request->subject,
        //     'messages' => $request->message,
        // ];
        // Mail::send('admin.email.mail_template', $message_date, function ($message)use($email) {
        //     $message->to($email);
        //     $message->subject(Session::get('subject'));
        // });
        // $notification=array(
        //     'message' => 'Email Send.Please Check Your Email',
        //     'alert-type' => 'success'
        // );
       // Session::put('test', 'Thanks for contacting us!');
        return redirect()->back()->with('success', 'Thanks for Contact, We will respose as soon as possible.');
    }
    
    public function quotation_store(Request $request){

       // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $contact = new Contact;
        $contact->contact_type = 'quote';
        $contact->sent_by = 8;
        $contact->sent_to = 9;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->status = $request->status;
        $contact->save();
       // dd($contact->name);
        Session::put('subject', $request->subject);
        $name= $contact->name;
        $email= $contact->email;
        $subject= $contact->subject;
        $description= $request->message;
        $message_date = [
            'names' =>$request->name,
            'email' => $request->email,
            'subject' =>$request->subject,
            'messages' => $request->message,
        ];
        Mail::send('admin.email.mail_template', $message_date, function ($message)use($email) {
            $message->to($email);
            $message->subject(Session::get('subject'));
        });
        $notification=array(
            'message' => 'Email Send.Please Check Your Email',
            'alert-type' => 'success'
        );
        Session::put('test', 'Thanks for contacting us!');
        return redirect()->back()->with('success', 'Thanks for asking Quotation, We will respose as soon as possible.');
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
       $contacts = Contact::where('contact_type','contact_us')->orderBy('id','desc')->paginate(20);
        return view('admin.contact.list-contact',compact('contacts'));
    }
    public function contact_quote(){
        $quote = Contact::where('contact_type','quote')->orderBy('id','desc')->paginate(20);
        return view('admin.contact.list-quote',compact('quote'));
    }
    public function member_msg_view(){
        $member_id = Auth::user()->id;
        // dd($member_id);
        $messages = Contact::where('contact_type', 'message')->where('sent_to', $member_id)->get();
        //dd($contacts);
        return view('member.message_view',compact('messages'));
    }
   
}

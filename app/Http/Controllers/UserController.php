<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class UserController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //  dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'status' => 'required',
        ]);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = Hash::make($request->password);
        $data->role_id = $request->role_id;
        $data->status = $request->status;
        $data->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect('admin/user')->with($notification);
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
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     //   dd($request->all());
        $data = User::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        if(!empty($request->password)){
            $data->password = Hash::make($request->password);
        }
        $data->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect('admin/user')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content= User::findOrfail($id);
        $content->status = 5;
        $content->update();    
        return redirect()->back();
    }

    public function edit_admin_profile(){
        $user= Auth::user();
        return view ('admin.user.profile_edit',compact('user'));
    }
    
    public function update_admin_profile(Request $request, string $id ){

        $user = User::findorFail($id);
        $user->name= $request->name;
        $user->email= $request->email;
        $user->profile_photo= $request->profile_photo;
        $user->save();
        return redirect()->back()->with('success','profile updated');
    }
}

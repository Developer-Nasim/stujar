<?php

namespace App\Http\Controllers;
use App\Models\Branch;
use Illuminate\Http\Request;
use Auth;

class BranchController extends Controller
{
    public function store(Request $request)
    {
        $branch = new Branch;
        $branch->member_id =  $request->companyId;
        $branch->user_id =  $request->userId;
        $branch->created_by = Auth::user()->id;
        $branch->name = $request->name;
        $branch->openHours = $request->openHours;
        $branch->address = $request->address;
        $branch->mapLink = $request->mapLink;
        $branch->contacts = json_encode($request->contact);
        $branch->status = $request->status;    
        
        if($branch->save()){
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $branch= Branch::findOrfail($id);
        return view('admin.branch.edit',compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

    //    dd($request->all());
        $branch = Branch::findOrfail($id);
        $branch->name = $request->name;
        $branch->openHours = $request->openHours;
        $branch->address = $request->address;
        $branch->mapLink = $request->mapLink;
        $branch->contacts = json_encode($request->contact);
        $branch->status = $request->status;    

        $branch->save();
        if(Auth::user()->id ==7){
            return redirect()->back();
        }
        else{
            return redirect('admin/member/branch/'.$request->user_id);
        }
       
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch= Branch::findOrfail($id);
        $branch->status = 3;
        $branch->update();    
        return redirect()->back();
    }
}

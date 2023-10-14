<?php

namespace App\Http\Controllers;
use App\Models\ContentEmployee;
use App\Models\Employee;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class EmployeeController extends Controller
{
    public function savecommitteemember(Request $request){
        // check already in this committee
        $committeeMember = ContentEmployee::where('content_id',$request->content_id)->where('employee_id',$request->employee_id)->get()->first();
        if(empty($committeeMember->id)){
            $contentEmployee = new ContentEmployee();
            $contentEmployee->content_id = $request->content_id;
            $contentEmployee->employee_id = $request->employee_id;
            $contentEmployee->post = $request->post;
            $contentEmployee->sequence = $request->sequence;
            $contentEmployee->save();
        }
        return redirect()->back();
       
    }

    public static function savesinglecommitteemember($content_id,$employee_id,$post){
        // check already in this committee
        $committeeMember = ContentEmployee::where('content_id',$content_id)->where('employee_id',$employee_id)->get()->first();
        if(empty($committeeMember->id)){
            $contentEmployee = new ContentEmployee();
            $contentEmployee->content_id = $content_id;
            $contentEmployee->employee_id = $employee_id;
            $contentEmployee->post = $post;
            $contentEmployee->sequence = $post;
            $contentEmployee->save();
            return true;
        }
        return false;
       
    }

    public function savecommitteesmember(Request $request){
        $i = 1;
        foreach($request->member as $emp){
            if(!empty($emp['name']) && !empty($emp['slug'])){
                if(!empty($emp['id'])){
                    // edit the employee info
                    $employee = Employee::findOrfail($emp['id']);
                    $employee->name = $emp['name'];
                    $employee->slug = $emp['slug'];
                    $employee->contact = $emp['contact'];
                    $employee->email = $emp['email'];
                    $employee->website = $emp['website'];
                    // $employee->status = 1; 
                    $statusCode = 200;
                    // dd($request->file);
                    if(!empty($request->file[$i])){
                        // dd('d',$request->file[$i],$i);
                        $employee->profilePhoto = Upload::createSingleUpload($request->file[$i]);
                    }
                    // dd('dd');
                    if($employee->save()){
                        if($emp['slug'] != $emp['oldslug']){
                            $result = (new LandingController)->generateLanding('employee',$statusCode,$emp['slug']);
                            $result_new = (new LandingController)->addNextLanding('employee',301,$emp['oldslug'],$emp['slug']);
                        }
                    } 
                }else{
                    // save the new employee info
                    $employee = new Employee;
                    $employee->created_by = Auth::user()->id;
                    $employee->name = $emp['name'];
                    $employee->slug = $emp['slug'];
                    $employee->contact = $emp['contact'];
                    $employee->email = $emp['email'];
                    $employee->website = $emp['website'];
                    $employee->status = 1; 
                    $statusCode = 200;
                    $result = (new LandingController)->generateLanding('employee',$statusCode,$emp['slug']);
                    if($result == 2){
                        $employee->profilePhoto = Upload::createSingleUpload($request->file[$i]);
                        if($employee->save()){
                            $this->savesinglecommitteemember($request->content_id,$employee->id,$emp['post']);
                        }
                    }
                }
            }
            $i++;
        }
        return redirect()->back()->with('success','Committee members has been updated successfully!');
        // dd($request);
        
    }

    public function findByName($search){
        $employees = Employee::select('name','id','profilePhoto')->where('name', 'like', "%{$search}%")->get();
        return response()->json($employees);
    }

    public function store(Request $request)
    {
        // dd($request);
        $employee = new Employee;
        $employee->member_id =  $request->companyId;
        $employee->user_id =  $request->userId;
        $employee->created_by = Auth::user()->id;
        $employee->name = $request->name;
        $employee->slug = $request->slug;
        $employee->designation = $request->designation;
        $employee->profilePhoto = $request->profilePhoto;
        $employee->contact = $request->contact;
        $employee->email = $request->email;
        $employee->website = $request->website;
        $employee->about = $request->about;
        $employee->bloodGroup = $request->bloodGroup;
        $employee->status = $request->status;    
        
        if($request->status == 1){$statusCode = 200;}else{$statusCode = 404;}
        //generate a new pagelink
        $result = (new LandingController)->generateLanding('employee',$statusCode,$request->slug);
        if($result == 2){
            if($employee->save()){
                return redirect()->back();
            }
        }
        return back()->withInput();
       
    }
    public function edit($id)
    {
        $employee= Employee::findOrfail($id);
        return view('admin.employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

    //    dd($request->all());
        $employee = Employee::findOrfail($id);
        $employee->name = $request->name;
        $employee->slug = $request->slug;
        $employee->designation = $request->designation;
        // $employee->profilePhoto = $request->profilePhoto;
        $employee->contact = $request->contact;
        $employee->email = $request->email;
        $employee->website = $request->website;
        $employee->about = $request->about;
        $employee->bloodGroup = $request->bloodGroup;
        $employee->status = $request->status;  

        if($request->status == 1){$statusCode = 200;}else{$statusCode = 404;}
        // dd($request->file['item']);
        if(!empty($request->file['item'])){
            $employee->profilePhoto = Upload::createSingleUpload($request->file);
        }

        if($employee->save()){
            if($request->slug != $request->oldslug){
                $result = (new LandingController)->generateLanding('employee',$statusCode,$request->slug);
                $result_new = (new LandingController)->addNextLanding('employee',301,$request->oldslug,$request->slug);
            }elseif($request->status != 1){
                $result = (new LandingController)->updateLanding('employee',$statusCode,$request->slug);
            }
        } 
        if(Auth::user()->id ==7){
            return redirect()->back();
        }
        else{
            return redirect('admin/member/employee/'.$request->user_id);
        }

    }
    public function destroy(string $id)
    {
        $content= Employee::findOrfail($id);
        $content->status = 4;
        $content->update();    
        return redirect()->back();
    }
}

@extends('admin.layouts.app')
@section('content')
@php
$arr_post = [1=>'President',2=>'Vice President',3=>'Secretary',4=>'J. Secretary',5=>'Treasurer',6=>'IT & Promotion Publications Editor',7=>'Member 1',8=>'Member 2',9=>'Member 3'];
@endphp
<div class="col-lg-12"> 
    <div class="main-card mb-3 card">
        @include('admin/card_head',[
            'title'=>'BCS Committee Management',
            'info'=>'Create and manage committe of BCS Computer City',
            'links'=>[
                0=>['text'=>'Create New Committee','link'=>'/admin/committee/create']
            ]  
        ])
        <div class="card-body">
            <table class="mb-0 table table-bordered">
                <thead>
                    <tr>
                        <th>Committee Name</th>
                        <th>Members</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contents as $content)
                    @php
                        $arr_posted = [];
                        foreach($content->content_employee as $emp){
                            $arr_posted[$emp->employee_id] = $emp->post;
                        }
                        // dd($arr_posted);
                    @endphp
                    <tr>
                        <td>
                            <h4>{{ $content->name }}</h4>
                            @php
                            if($content->status == 1){
                                    echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                                }else{
                                    echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                                }
                            @endphp
                            <a href="{{URL::to('admin/committee/'.$content->id.'/edit')}}" title="Edit" style="float: left; margin-left: 10px; margin-right: 10px">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                            </a> 
                            Search representative: <input type="text" data-content = {{$content->id}} id="employeenamesearch-{{$content->id}}" name="employeenamesearch" class="employeenamesearch">
                            <div id="selectName"></div>
                        </td>
                        <td>
                            @if(!empty($content->employee))
                                @foreach($content->employee as $employee)
                                    @php
                                        // dd($employee)
                                    @endphp
                                    <div class="row mb-2">
                                        <div class="col-3"><img class="img-fluid rounded" src="/images/uploads/large/{{$employee->profilePhoto}}"></div>
                                        <div class="col-9">
                                        <b>{{$employee->name}}</b><br>
                                        @if (!empty($arr_posted[$employee->id]))
                                          <div class="badge badge-info">{{$arr_post[$arr_posted[$employee->id]]}}</div>
                                        @endif
                                      
                                        <div class="mt-2">
                                        <a href="{{URL::to('admin/employee/'.$employee->id.'/edit')}}" title="Edit" class="btn btn-info float-left mx-2">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                            @include('admin.button_delete_pivot',['action' => 'committee_employee/delete/'.$employee->id.'/'.$content->id])
                                        </div>
                                      
                                        </div>
                                        
                                    </div>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    @empty
                        Nothing found!
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
@endsection

@section('script_footer')
<script>
$(".employeenamesearch").keyup(function(){
    devpath = window.location.origin
    var nameValue = $("#"+$(this).attr('id')).val()
    console.log(nameValue);
    var content_value = $(this).attr('data-content')
      if(nameValue){
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          type: "POST", 
          url: devpath+ "/admin/findemployee/"+nameValue,
          success: function(data) { 
            // console.log(data)
            $("#selectName").empty()
            if(data){
            //   $("#formPageLinkId").val(data)
                for (var i=0; i<data.length; i++) {
                    // console.log(data[i].name)
                rowHtml = $("#output-row").html().replace('employee_value',data[i].id).replace('name_value',data[i].name).replace('employee_row_count',i).replace('employee_photo',devpath+'/images/uploads/large/'+data[i].profilePhoto).replace('content_value',content_value);
                $("#selectName").append( rowHtml)
                }
            }else{
            //console.log('Page link not found, or permanently removed')
            }
          }
        })
      }else{

      }
});
</script>
<div id="output-row" style="display:none">
    <div class="border p-4 mt-4">
        <form method="post" class="row committee-member-add" action="{{URL::to('admin/savecommittee')}}">
            @csrf
            <div class="col-2"><img class="img-fluid  rounded" src="employee_photo" width="100"></div>
            <div class="col-10">
                <div>Name: <b>name_value</b></div>
                
                <input type="hidden" name="content_id" required="required" value="content_value">
                <input type="hidden" name="employee_id" required="required" value="employee_value">
                <select name="post" required="required">
                    <option value=0>Please Select post</option>
                    <option value=1>President</option>
                    <option value=2>Vice President</option>
                    <option value=3>Secretary</option>
                    <option value=4>J.Secretary</option>
                    <option value=5>Treasurer</option>
                    <option value=6>IT & Promotion Publications Editor</option>
                    <option value=7>Member</option>
                </select>
                Sequence: <input name="sequence" required="required" type="number" value="10">
                <input type="submit" class="button btn-success mt-2" value="Add to committee">
            </div>
        </form>
    </div>
</div>
@endsection
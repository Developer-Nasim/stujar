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
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contents as $content)
                        @php
                            $arr_posted = $arr_post_emp = $arr_post_emp_name = $arr_emp_id_name = $arr_emp_id_contact = $arr_emp_id_email = $arr_emp_id_website = $arr_emp_id_photo = $arr_emp_id_id = [];
                            foreach($content->content_employee as $emp){ 
                                $arr_posted[$emp->employee_id] = $emp->post;
                                $arr_post_emp[$emp->post] = $emp->employee_id;
                                $arr_post_emp_name[$emp->post] = $emp->name;
                            }
                        @endphp  
                        @if (!empty($content->employee))  
                            @foreach($content->employee as $employee)  
                                <?php
                                $arr_emp_id_id[$employee->id] = $employee->id;
                                $arr_emp_id_name[$employee->id] = $employee->name;
                                $arr_emp_id_slug[$employee->id] = $employee->slug;
                                $arr_emp_id_contact[$employee->id] = $employee->contact;
                                $arr_emp_id_email[$employee->id] = $employee->email;
                                $arr_emp_id_website[$employee->id] = $employee->website;
                                $arr_emp_id_photo[$employee->id] = $employee->profilePhoto;
                                ?>
                            @endforeach
                        @endif 
                        <div style="display:none">
                        @foreach($arr_post as $key => $value)
                        <div @if ($loop->first) class="col-12 col-md-12" @else class="col-6 col-md-3"  @endif>  
                            @if(!empty($arr_post_emp[$key]))
                                <img src="/images/uploads/large/{{ $arr_emp_id_photo[$arr_post_emp[$key]] ?? '' }}" alt="team">
                                <span class="d-block text-danger">{{ $arr_emp_id_name[$arr_post_emp[$key]] ?? '' }}</span>
                                <h5>{{ $arr_post[$key] }}</h5>
                            @endif
                        </div>
                        @endforeach
                        </div>
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
                            <hr>
                            
                            <!-- committee member add form -->
                            <form class="" action="{{URL::to('admin/savecommittees/')}}"  method="post" enctype="multipart/form-data">
                                @csrf
                                    <input name="content_id" type="hidden" value="{{$content->id}}">
                                    @foreach($arr_post as $key => $value)
                                        @php
                                        $contact = $name = $slug = $id = '';
                                        $photo = "blank-profile-picture.webp";
                                        if(!empty($arr_post_emp[$key])){
                                            $id = $arr_emp_id_id[$arr_post_emp[$key]];
                                            $name = $arr_emp_id_name[$arr_post_emp[$key]];
                                            $slug = $arr_emp_id_slug[$arr_post_emp[$key]];
                                            $contact = $arr_emp_id_contact[$arr_post_emp[$key]];
                                            $email = $arr_emp_id_email[$arr_post_emp[$key]];
                                            $website = $arr_emp_id_website[$arr_post_emp[$key]];
                                            $photo = $arr_emp_id_photo[$arr_post_emp[$key]];
                                        }
                                        @endphp
                                        <div class="border p-2 mb-2 bg-light">
                                            <legend class="h3">{{$value}}</legend>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label class="">Name</label>
                                                        <input name="member[{{$key}}][name]" value="{{$name}}" type="text" class="form-control">
                                                        <input name="member[{{$key}}][post]" type="hidden" class="form-control" value="{{$key}}">
                                                        <input name="member[{{$key}}][id]" type="hidden" class="form-control" value="{{$id}}">
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label class="">Slug</label>
                                                        <input value="{{$slug}}" name="member[{{$key}}][slug]" id="slug{{$key}}" type="text" class="slug-autocheckup form-control">
                                                        <input value="{{$slug}}" name="member[{{$key}}][oldslug]" id="oldslug{{$key}}" type="hidden">
                                                        <span style="display:none" id="slugNotice{{$key}}" class="text-danger">This slug already exists</span>
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <div class="row">
                                                            <div class="col-2">
                                            <img src="/images/uploads/large/{{$photo}}" alt="team">
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="text-danger mb-2"><b>Image Must be .Webp Format. width: 500px, height: 400px</b> </div>
                                                                <input name="file[{{$key}}][item]" id="" type="file" class="form-control pb-2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label class="">Contact</label>
                                                        <input name="member[{{$key}}][contact]" value="{{$contact}}" type="text" class="form-control">
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label class="">Email</label>
                                                        <input name="member[{{$key}}][email]" value="{{$email}}" type="text" class="form-control">
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label class="">Website</label>
                                                        <input name="member[{{$key}}][website]" value="{{$website}}" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @include('admin/button_submit')
                            </form><!-- /committee member add form -->
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
$(".slug-autocheckup").keyup(function(){
    // console.log('ok, slug-autocheckup');
    devpath = window.location.origin
    namevalue = $(this).val()
    nameid = $(this).attr('id')
    // console.log('nameid',nameid)
    // console.log('form-slug-unique:',$(this).val())
    // alert($(this).find("input[class='slug-autocheckup']").val());
    
    if(namevalue){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST", 
            url: devpath+"/admin/a/"+namevalue,
            success: function(data) { 
                // when is return, the slug exists
                // console.log('data:',data)
                // console.log('data lenght:',data.length)

                // to be changed after conplete a discussion why data has value when false 
                if(data.length == 2){
                    $("#"+nameid).next().hide()
                    $("#submit").show();
                    //$(this).append('This slug already exists')
                    // console.log('hide');
                }else{
                    // $(this).next().show()

                    // console.log('show')
                    $("#"+nameid).next().show()
                    $("#submit").hide()
                    // nameidelm.next().show()
                    // console.log($(this))
                    //$(this).append('abcd')
                    // $(this).addClass('abcd');
                    // $(this).append('This slug already exists')
                }
            }
        })
    }
});
</script>
@endsection
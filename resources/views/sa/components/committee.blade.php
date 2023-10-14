@php
$arr_post = [1=>'President',2=>'Vice President',3=>'Secretary',4=>'J. Secretary',5=>'Treasurer',6=>'IT & Promotion Publications Editor',7=>'Member',8=>'Member',9=>'Member'];
@endphp
<div class="section-headding management-heading text-center text-white border-bottom">
    <a href="committee">
        <h2>Management Committee</h2>
    </a>
    <p>BCS Computer City (Jan 2023 - Dec 2024)</p>
</div>
 <section class="section-padding-2">
    <div class="container management-committee">
        <style>
            .member>div{text-align:center;margin-bottom:25px}
            .member img{width:150px;border:5px solid #ddd;border-radius: 50%;padding:5px;}
        </style>
        <div class="row member">  
            @if(!empty($singlecommittee->content_employee))         
                @php
                    $arr_posted = $arr_post_emp = $arr_post_emp_name = $arr_emp_id_name = $arr_emp_id_photo = $arr_emp_id_slug = [];
                    foreach($singlecommittee->content_employee as $emp){ 
                        $arr_posted[$emp->employee_id] = $emp->post;
                        $arr_post_emp[$emp->post] = $emp->employee_id;
                        $arr_post_emp_name[$emp->post] = $emp->name;
                    }
                @endphp  
                @if (!empty($singlecommittee->employee))  
                    @foreach($singlecommittee->employee as $employee)  
                        <?php
                        $arr_emp_id_name[$employee->id] = $employee->name;
                        $arr_emp_id_slug[$employee->id] = $employee->slug;
                        $arr_emp_id_photo[$employee->id] = $employee->profilePhoto;
                        ?>
                    @endforeach
                @endif 
                
                @foreach($arr_post as $key => $value)
                <div @if ($loop->first) class="col-12 col-md-12" @else class="col-6 col-md-3"  @endif>  
                    @if(!empty($arr_post_emp[$key]))
                        <a href="{{ $arr_emp_id_slug[$arr_post_emp[$key]] }}"><img src="/images/uploads/thumb/{{ $arr_emp_id_photo[$arr_post_emp[$key]] ?? '' }}" alt="team"></a>
                        <h2 class="mt-2"><a class="d-block text-dark fw-normal" href="{{ $arr_emp_id_slug[$arr_post_emp[$key]] }}">{{ $arr_emp_id_name[$arr_post_emp[$key]] ?? '' }}</a></h2>
                        <h4 class="mt-2 text-2x text-gradient"><a href="{{ $arr_emp_id_slug[$arr_post_emp[$key]] }}">{{ $arr_post[$key] }}</a></h4>
                    @endif
                </div>
                @endforeach
            @endif
        </div>   
    </div>
</section>
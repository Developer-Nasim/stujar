@extends('admin.layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<style>
    .date {
        position: relative;
        width: 150px; height: 25px;
        color: white;
    }
    .date:before {
        top: 3px; left: 3px;
        content: attr(data-date);
        display: inline-block;
        color: black;
    }
    .date::-webkit-datetime-edit, .date::-webkit-inner-spin-button, .date::-webkit-clear-button {
        display: none;
    }
    .date::-webkit-calendar-picker-indicator {
        position: absolute;
        top: 3px;
        right: 0;
        color: black;
        opacity: 1;
    }
</style>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="main-card mb-3 card">
    @include('admin/card_head',[
        'title'=>'Create Event',
        'info'=>'Editing this section will change socail share data and SEO information.',
        'links'=>[
            0=>['text'=>'List Event','link'=>'/admin/event']
          ]  
      ])
    <div class="card-body">
        <form class="" action="{{URL::to('admin/event')}}"  method="post" enctype="multipart/form-data">
    @csrf
<div class="row">
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="exampleEmail" class="">Title</label>
            <input name="title" type="text" class="form-control" id="name">
        </div>
    </div>
    <div class="col-md-6">
        @include('admin/form_slug')
    </div>
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="exampleEmail" class="">Start Date</label>
   <input type="date" class="date" name="start_date" data-date="" data-date-format="DD/MM/YYYY" value="<?php echo date('Y-m-d'); ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="exampleEmail" class="">End Date</label>
 <input type="date" class="date" name="end_date" data-date="" data-date-format="DD/MM/YYYY" value="<?php echo date('Y-m-d'); ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="exampleEmail" class="">Event Type</label>
            <select class="form-select" aria-label="Default select example" name="event_type">
                <option value="current">Current</option>
                <option value="upcoming">Upcoming</option>
                <option value="past">Past</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="exampleEmail" class="">Adress</label>
            <input name="address" type="text" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="exampleEmail" class="">Location</label>
            <input name="location" type="text" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="exampleEmail" class="">Event Profile Image </label>
            <span class="text-danger">( Image Size 560px X 250px )</span>
            <input name="logo" type="file" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="exampleEmail" class="">Event Cover Image</label>
            <span class="text-danger">( Image Size 980px X 360px )</span>
            <input name="banner" type="file" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="exampleEmail" class="">Entry Fee</label>
            <input name="entry_fee" type="text" class="form-control">
        </div>
    </div> 
    <div class="col-md-12">
        @include('admin.form_ckeditor',['label'=>'Description','name'=>'description'])
    </div> 
</div>
@include('admin/form_meta')
@include('admin/form_status')
@include('admin/button_submit')
</form>
</div>
</div>
<script>
    $("input").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format( this.getAttribute("data-date-format") )
        )
    }).trigger("change")
</script>
@endsection
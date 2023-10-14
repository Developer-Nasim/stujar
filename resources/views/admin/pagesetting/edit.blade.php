<?php 
// dd($pagesetting);?>
@extends('admin.layouts.app')
@section('content')
<div class="row">
<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="d-flex justify-content-between bd-highlight mb-2 border-bottom pb-2">
                <div>
                <h5 class="card-title">Edit Page Setting</h5>
                <p>Editing this section will change social share data and SEO information.</p>
                </div>
                <div>
                    <a class="btn btn-info" href="{{URL::to('admin/pagesetting')}}">Manage PageSetting</a>
                    <a class="btn btn-info" href="{{URL::to('admin/pagesetting/create')}}">Create New PageSetting</a>
                    @include('admin/button_back')
                </div>
            </div>
            <form class="" action="{{URL::to('admin/pagesetting/'.$pagesetting->id)}}"  method="post">
                @csrf
                @method('PATCH')
                <div class="position-relative form-group">
                    <label class="">Page Slug: {{ $pagesetting->meta_slug }}</label>
                </div>
                @include('admin.form_meta',
                [
                    'heading'=>$pagesetting->meta_heading,
                    'keyword'=>$pagesetting->meta_keywords,
                    'meta_title'=>$pagesetting->meta_title,
                    'meta_description'=>$pagesetting->meta_description,
                    'meta_robots'=>$pagesetting->meta_robots,
                    'meta_canonical'=>$pagesetting->meta_canonical,
                    'meta_image'=>$pagesetting->meta_image,
                ]
                )
                @include('admin.form_ckeditor',['label'=>'Page Details','name'=>'page_description','value'=>$pagesetting->page_description])
                @include('admin/button_submit')
            </form>
        </div>
    </div>
</div>
</div>
@endsection
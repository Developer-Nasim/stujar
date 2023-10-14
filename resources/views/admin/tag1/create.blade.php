@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            @include('admin/card_head',[
                'title'=>'Create Menu',
                'info'=>'Website Menu.',
                'links'=>[
                    0=>['text'=>'Menu List','link'=>'/admin/tag']
                ]  
            ])
            <div class="card-body">
                <form class="" action="{{URL::to('admin/tag/')}}" method="post">
                    @csrf
                    <div class="position-relative form-group">
                        <label class="">Parent Menu</label>
                        @php
                        if(!empty($tags)){
                            echo '<select name="parent" class="form-select fs-4">';
                                echo '<option value=0>Select</option>';
                            foreach($tags as $key => $value){
                                echo '<option value="'.$value['id'].'">'.$value['title'].'</option>';
                            }
                            echo '</select>';
                        }
                        @endphp
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Menu Name</label>
                        <input name="title" type="text" required="required" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Web Link</label>
                        <input name="linkto" type="text" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Outer Link</label>
                        <input name="linkUrl" type="text" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Sequence</label>
                        <input name="sequence" type="number" class="form-control">
                    </div>
                    @include('admin.form_status')
                    @include('admin/button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
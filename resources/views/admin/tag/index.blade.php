@extends('admin.layouts.app')
@section('content')
@php
$arr_tag_type = [1=>'Top Menu',2=>'Footer Menu',3=>'Category',4=>'Tags'];
@endphp
<div class="main-card mb-3 card">
  @include('admin/card_head',[
    'title'=>'Website '.$arr_tag_type[$tagtype],
    'info'=>'Add, Edit, Update, Delete from here..',
    'links'=>[
        0=>['text'=>'Create New','link'=>'/admin/tag/create?type='.$tagtype],
        1=>['text'=>'Top Menu','link'=>'/admin/tag/1'],
        2=>['text'=>'Footer Menu','link'=>'/admin/tag/2'],
        3=>['text'=>'Category','link'=>'/admin/tag/3'],
        4=>['text'=>'Tags','link'=>'/admin/tag/4']
      ]  
  ])

  <div class="card-body">
  <?php
    $arr_status = [1=>'Active',2=>'Inactive',3=>'Pending',4=>'Disabled'];
    $menus = [];
    $i = 1;
    foreach($tags as $tag){
      if(empty($tag->parent)){
        $menus[$tag->id]['id']= $tag->id;
        $menus[$tag->id]['title']= $tag->title;
        $menus[$tag->id]['linkto']= $tag->linkto;
        $menus[$tag->id]['linkUrl']= $tag->linkUrl;
        $menus[$tag->id]['status']= $tag->status;
        $menus[$tag->id]['sequence']= $tag->sequence;
      }else{
        $child[$tag->parent][$i]['id'] = $tag->id;
        $child[$tag->parent][$i]['title'] = $tag->title;
        $child[$tag->parent][$i]['linkto'] = $tag->linkto;
        $child[$tag->parent][$i]['linkUrl'] = $tag->linkUrl;
        $child[$tag->parent][$i]['status'] = $tag->status;
        $child[$tag->parent][$i]['sequence'] = $tag->sequence;
        $i++;
      }
    }
    ?>
    <div class="row">
      <div class="col-md-4">
        @foreach ($menus as $key => $value)
          <div class="main-menu mb-2">
            <div class="menu-title">
              {{ $value['title'] }}
              <span class="badge badge-info status-{{ $value['status'] ?? '' }}"> {{ $arr_status[$value['status']] ?? '' }}</span>
            </div>
            <div class="menu-edit">
              <a href="{{ URL::to('admin/tag/'.$value['id'].'/edit') }}"><i class="fa fa-edit"></i></a>
            </div>   
          </div>
          @if(!empty($child[$key]))
              @foreach ($child[$key] as $ke => $val)
                <div class="sub-menu mb-2">
                  <div class="menu-title">
                    {{ $val['title'] }} <i> (Sub Item)</i>
                    <span class="badge badge-info status-{{ $val['status'] ?? '' }}"> {{ $arr_status[$val['status']] ?? '' }}</span>
                  </div>
                  <div class="menu-edit">
                    <a href="{{ URL::to('admin/tag/'.$val['id'].'/edit') }}"><i class="fa fa-edit"></i></a>
                  </div>   
                </div>
              @endforeach          
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
<style>
  .tag-table ul li{list-style-type: none;}
  .main-menu{
    background: #efefef;
    font-weight: 600;
    width: 95%;
    display: flex;
    justify-content: space-between;
    padding: 10px;
    border: 1px solid #e5e5e5;
    border-radius: 2px;

  }
  .sub-menu{
    background: #efefef;
    display: flex;
    justify-content: space-between;
    padding: 10px;
    border: 1px solid #e5e5e5;
    border-radius: 2px;
    margin-left: 30px;
  }
</style>
@endsection
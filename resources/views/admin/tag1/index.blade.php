@extends('admin.layouts.app')
@section('content')
<div class="main-card mb-3 card">
  @include('admin/card_head',[
    'title'=>'Menu',
    'info'=>'Website Menu.',
    'links'=>[
        0=>['text'=>'New Menu','link'=>'/admin/tag/create']
      ]  
  ])
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
  }else{
    $child[$tag->parent][$i]['id'] = $tag->id;
    $child[$tag->parent][$i]['title'] = $tag->title;
    $child[$tag->parent][$i]['linkto'] = $tag->linkto;
    $child[$tag->parent][$i]['linkUrl'] = $tag->linkUrl;
    $child[$tag->parent][$i]['status'] = $tag->status;
    $i++;
  }
}
echo '<ul>';
foreach($menus as $key => $value){
  echo '<li class="py-2">'.$value['title'].' <i>(<u>'.$value['linkto'].'</u>)</i> &nbsp;&nbsp;<span class="badge badge-info status-'.$value['status'].'">'.$arr_status[$value['status']].'</span> &nbsp;&nbsp;<a href="'.URL::to('admin/tag/'.$value['id'].'/edit').'"><i class="fa fa-edit"></i></a>';
  if(!empty($child[$key])){
    echo '<ul>';
    foreach($child[$key] as $ke => $val){
      echo '<li class="py-2">'.$val['title'].' <i>(<u>'.$val['linkto'].'</u>)</i> &nbsp;&nbsp;<span class="badge badge-info status-'.$val['status'].'">'.$arr_status[$val['status']].'</span> &nbsp;&nbsp;<a href="'.URL::to('admin/tag/'.$val['id'].'/edit').'"><i class="fa fa-edit"></i></a>';
      echo '</li>';
    }
    echo '</ul>';
  }
  echo '</li>';
}
echo '</ul>';
?>
  <div class="card-body">
    <div class="bootstrap-table bootstrap4">
      <div class="fixed-table-toolbar"></div>
      <div class="fixed-table-container" style="padding-bottom: 0px;">
        
        <div class="fixed-table-body">
          <table data-toggle="table" data-sort-name="stargazers_count" data-sort-order="desc" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Menu Name</th>
                <th>Links</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            
              @foreach($tags as $tag)
              <tr>
                <td>
                  {{$tag->title}} - {{$tag->status}}
                </td>
                <td>
                {{$tag->linkto}}
                </td>
                <td>
                <a href="{{URL::to('admin/tag/'.$tag->id.'/edit')}}" title="Edit">

                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>

                    </button>

                </a>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
      <div class="fixed-table-pagination" style="display: none;"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>

@endsection
@extends('admin.layouts.app')
@section('content')
<div class="main-card mb-3 card">
  @include('admin/card_head',[
    'title'=>'Website Dynamic Setting Options',
    'info'=>'This section is extremely sensative and related with application status.'
    ])
  <div class="card-body">
    <div class="bootstrap-table bootstrap4">
      <div class="fixed-table-toolbar"></div>
      <div class="fixed-table-container" style="padding-bottom: 0px;">
        <div class="fixed-table-header" style="display: none;">
          <table></table>
        </div>
        <div class="fixed-table-body">
          <div class="fixed-table-loading table table-bordered table-hover" style="top: 42px; display: none;">
            <span class="loading-wrap">
              <span class="loading-text">Loading, please wait</span>
              <span class="animation-wrap">
                <span class="animation-dot"></span>
              </span>
            </span>
          </div>
          <table data-toggle="table" data-sort-name="stargazers_count" data-sort-order="desc" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="" data-field="name">
                <div class="row">
                    <div class="col-sm-2">Name</div>
                    <div class="col-sm-7">Value</div>
                    <div class="col-sm-3">Action</div>
                </div>
                </th>
              </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <form class="" action="{{URL::to('admin/siteoption')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-2"><input name="okey" type="text" class="form-control"></div>
                            <div class="col-sm-7"><input name="ovalue" type="text" class="form-control"></div>
                            <div class="col-sm-3"><button class="mt-1 btn btn-success" type="submit">Save</button></div>
                        </div>
                    </form>
                </td>
            </tr>
              @foreach($siteoptions as $content)
              <tr>
                <td>
                    <form class="" action="{{URL::to('admin/siteoption/'.$content->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-sm-2">{{ $content->okey }}</div>
                            <div class="col-sm-7"><input name="ovalue" type="text" class="form-control" value="{{ $content->ovalue }}"></div>
                            <div class="col-sm-3"><button class="mt-1 btn btn-success" type="submit">Update</button></div>
                        </div>
                    </form>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
        <div class="fixed-table-footer">
          <table>
            <thead>
              <tr></tr>
            </thead>
          </table>
        </div>
      </div>
      <div class="fixed-table-pagination" style="display: none;"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>

@endsection
@extends('admin/Layout.app')
@section('title', 'News List')
@section('content')
{{-- @foreach ($allPostData as $allPostData) --}}
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex">
        <h4>News List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
            <thead>
              <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Status</th>
                <th>View</th>
                <th>Public date</th>
                <th>Create At</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($allPostData as $allPostData)
              <tr>
                <td> <img width="35" src=" {{asset('public/'.$allPostData->post_thumbnail) }}"> </td>
                <td> {{$allPostData->post_title}} </td>
                <td> {{$allPostData->catagories}} </td>
                <td>{{$allPostData->post_tags}} </td>
                <td>
                  @if ($allPostData->status == 'Publish')
                      <div class="badge badge-success"> {{$allPostData->status}} </div>
                  @elseif ($allPostData->status == 'Draft')
                      <div class="badge badge-danger"> {{$allPostData->status}} </div>
                  @elseif ($allPostData->status == 'Pending')
                      <div class="badge badge-warning"> {{$allPostData->status}} </div>
                  @else 
                      <div class="badge badge-light"> {{$allPostData->status}} </div>
                  @endif
                </td>
                <td>{{$allPostData->view}}</td>
                <td>{{$allPostData->public_date}}</td>
                <td>{{$allPostData->created_at}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
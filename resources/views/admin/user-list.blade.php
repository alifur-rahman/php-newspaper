@extends('admin/Layout.app')
@section('title', 'User List')
@section('content')
{{-- @foreach ($allPostData as $allPostData) --}}
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex">
        <h4>User List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
            <thead>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Role</th>
                <th>Email</th>
                <th>Create At</th>
                <th>Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($result as $allPostData)
              <tr>
               
                <td> {{$allPostData->name}} </td>
                <td> {{$allPostData->username}} </td>
                <td>{{$allPostData->role}} </td>
                <td>{{$allPostData->email}} </td>
                <td>{{$allPostData->create_at}}</td>
                <td>
                    <div class="buttons d-flex">
                        <a href="/admin/user/list/edit/{{base64_encode($allPostData->id)}} " class="btn btn-icon  btn-primary"><i class="far fa-edit"></i></a>
                        <a href="/admin/user/list/delete/{{base64_encode($allPostData->id)}}" onclick="return confirm('are you sure?')" class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </td>
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
@extends('admin/Layout.app')
@section('title', 'ePaper List')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex">
        <h4>ePaper List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
            <thead>
              <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Public date</th>
                <th>Create At</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ePaperData as $item)
              <tr>
                <td><img width="35" src=" {{asset('public/'.$item->image) }}"> </td>
                <td> {{$item->title}} </td>
                <td>{{$item->publish_at}}</td>
                <td>{{$item->create_at}}</td>
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
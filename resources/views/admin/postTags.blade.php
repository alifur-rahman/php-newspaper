@extends('admin/Layout.app')
@section('title', 'Post Tags')
@section('content')
{{-- @foreach ($allTagsData as $allTagsData) --}}
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header d-flex">
              <h4>Tags List</h4>
            </div>
            <style>
                .dataTables_length {
                    display: none;
                }
            </style>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Create At</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($allTagsData as $allTagsData)
                    <tr>
                      <td> {{$allTagsData->Name}} </td>
                      <td> {{$allTagsData->created_at}} </td>
                      <td>
                        @if ($allTagsData->status == 'Published')
                            <div class="badge badge-success"> {{$allTagsData->status}} </div>
                        @elseif ($allTagsData->status == 'Draft')
                            <div class="badge badge-danger"> {{$allTagsData->status}} </div>
                        @elseif ($allTagsData->status == 'Pending')
                            <div class="badge badge-warning"> {{$allTagsData->status}} </div>
                        @else 
                            <div class="badge badge-light"> {{$allTagsData->status}} </div>
                        @endif
                      </td>
                      <td> 
                        <div class="buttons d-flex">
                            <a href="#" class="btn btn-icon  btn-primary"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-icon btn-secondary"><i class="far fa-eye"></i></a>
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
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
                <div id="success-msg">
                  <img width="200" height="200" src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif" alt="">
                </div>
                <div class="card-header">
                    <h4>Add new Tag</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input  id="tag_name" type="text" class="form-control">
                    </div>
                   
               
                    <div class="form-group">
                        <label>Description</label>
                        <textarea  id="tag_desc" class="form-control"></textarea>
                    </div>
                    <div class="form-group ">
                        <label class="col-form-label ">Status</label>
                          <select  id="tag_status" class="form-control selectric">
                            <option value="Published">Published</option>
                            <option value="Draft">Draft</option>
                            <option value="Pending">Pending</option>
                          </select>
                      </div>
                  
                </div>
                <div class="card-footer text-right">
                    <button onclick="sendTagData()"  class="btn btn-primary mr-1" type="submit">Submit</button>
                </div>  
        </div>
    </div>
</div>
@endsection
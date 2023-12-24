@extends('admin/Layout.app')
@section('title', 'Roles & Permission')
@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div id="success-msg">
            <img width="200" height="200" src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif" alt="">
            </div>
            <div class="card-header">
                <h4>Create new Roles </h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Role Name</label>
                    <input required id="role_name" type="text" class="form-control">
                </div>
            
        
                <div class="form-group">
                    <label class="form-label">Active Modules</label>
                    <div class="selectgroup selectgroup-pills">
                        @foreach ($controllerResult as $item)
                            <label class="selectgroup-item">
                                <input type="checkbox" name="value" value="{{ $item->parents }}" class="selectgroup-input">
                                <span class="selectgroup-button">{{ str_replace('_', ' ',$item->parents) }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
            
            </div>
            <div class="card-footer text-right">
                <button onclick="sendNewRoleData()" class="btn btn-primary mr-1" >Submit</button>
            </div>      
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Roles list</h4>
              
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
                        <th>Role Name</th>
                        <th>Active Modules</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($rolesDetails as $item)

                        <tr>
                            <td> {{ $item->role }}</td>
                            <td>{{ $item->active_modules }}</td>
                            <td> 
                            <div class="buttons d-flex">
                                <a href="/admin/user/roles_permission/edit/{{base64_encode($item->id)}} " class="btn btn-icon  btn-primary"><i class="far fa-edit"></i></a>
                                <a href="/admin/user/roles_permission/delete/{{base64_encode($item->id)}}" onclick="return confirm('are you sure?')" class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i></a>
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
@extends('admin/Layout.app')
@section('title', 'Create User')
@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Create User</h4>
         
        </div>
        <div class="card-body">
            <div id="success-msg">
                <img width="200" height="200" src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif" alt="">
              </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Name</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" id="name" class="form-control">
              </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Username</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" id="username"  class="form-control">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Email</label>
                <div class="col-sm-12 col-md-7">
                  <input type="email" id="email"  class="form-control">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Password</label>
                <div class="col-sm-12 col-md-7">
                  <input type="password" id="password"class="form-control">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Confirm Password</label>
                <div class="col-sm-12 col-md-7">
                  <input type="password" id="c_password"class="form-control">
                </div>
            </div>


            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Roles</label>
              <div class="col-sm-12 col-md-7" >
                <select id="role_data" class="form-control selectric">
                 
                </select>
              </div>
              
            </div>
            
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7 text-right">
                <input type="submit" onclick="sendUserData()" class="btn btn-primary" value="Create">
              </div>
            </div>
           
        </div>
      </div>
    </div>
  </div>

@endsection
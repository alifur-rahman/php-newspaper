@extends('admin/Layout.app')
@section('title', 'Edit User')
@section('content')

<div class="row">
  <div class="col-md-7">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4> Edit <span style="color:green">{{ $name }}<span></h4>
        <h4>Current Role <span style="color:green"> {{ $role }} </span></h4>
      </div>
      <div class="card-body">
        <div id="success-msg">
          <img width="200" height="200"
            src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif"
            alt="">
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Name</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" id="name" class="form-control" value="{{ $name }}">
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Username</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" id="username" class="form-control" value="{{ $username }}">
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Email</label>
          <div class="col-sm-12 col-md-7">
            <input type="email" id="email" class="form-control" value="{{ $email }}">
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Roles</label>
          <div class="col-sm-12 col-md-7">
            <select id="role_data" class="form-control selectric">

            </select>
          </div>

        </div>

        <input type="hidden" id="u_id" value="{{ $u_id }}">

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
          <div class="col-sm-12 col-md-7 text-right">
            <input type="submit" onclick="updateUserinfo()" class="btn btn-primary" value="Update">
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4> Change Password<span></h4>
      </div>
      <div class="card-body">
        <div id="success-msg">
          <img width="200" height="200"
            src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif"
            alt="">
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Password</label>
          <div class="col-sm-12 col-md-7">
            <div class="password-input-icon d-flex justify-content-between align-items-center">
              <input type="password" id="password" class="form-control" value="{{ $password }}">
              <i class="pass-icon fas fa-eye-slash "></i>
            </div>

          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
          <div class="col-sm-12 col-md-7 text-right">
            <input type="submit" onclick="updateUserPassword()" class="btn btn-primary" value="Update">
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
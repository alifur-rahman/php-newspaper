@extends('user/Layout.app')
@section('title', 'Profile')
@section('content')
<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-4">
      <div class="card author-box">
        <div class="card-body">
          <div class="author-box-center">
            <img alt="image" src="
                @if ($photo != null)
                    {{asset('public/'.$photo)}}
                @else
                    {{asset('public/admin_assets/img/profesor.jpg')}}
                @endif
            " class="rounded-circle author-box-picture">
            <div class="clearfix"></div>
            <div class="author-box-name">
              <a href="#"> {{ $name }} </a>
            </div>
            <div class="author-box-job">{{ $role }} </div>
          </div>
          <div class="text-center">
            <div class="author-box-description">
              <p>
                {{ $bio }}
              </p>
            </div>
            
            <div class="w-100 d-sm-none"></div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-12 col-md-12 col-lg-8">
      <div class="card">
        <div class="padding-20">
          <ul class="nav nav-tabs" id="myTab2" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                aria-selected="true">About </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                aria-selected="false">Edit Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="photo-tab2" data-toggle="tab" href="#photo" role="tab"
                aria-selected="false">Change Photo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="password-tab2" data-toggle="tab" href="#password" role="tab"
                aria-selected="false">Change Password</a>
            </li>
           
          </ul>
          <div class="tab-content tab-bordered" id="myTab3Content">
              {{-- about  --}}
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
              <div class="row">
                <div class="col-md-3 col-6 b-r">
                  <strong> Name</strong>
                  <br>
                  <p class="text-muted">{{ $name }}</p>
                </div>
                <div class="col-md-3 col-6 b-r">
                  <strong>Mobile</strong>
                  <br>
                  <p class="text-muted">{{ $phone }}</p>
                </div>
                <div class="col-md-3 col-6 b-r">
                  <strong>Email</strong>
                  <br>
                  <p class="text-muted">{{ $email }}</p>
                </div>
                <div class="col-md-3 col-6">
                  <strong>Role</strong>
                  <br>
                  <p class="text-muted">{{ $role }}</p>
                </div>
              </div>
              <p class="m-t-30">{!! $somthing_about !!}</p>
            </div> 
            {{-- edit profile  --}}
            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                        <label for="name">Name</label>
                        </div>
                        <div class="form-group col-md-8 col-12">
                        <input id="name" type="text" class="form-control" value="{{ $name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-group col-md-8 col-12">
                            <input id="username" type="text" class="form-control" value="{{ $username }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                        <label for="email">Email</label>
                        </div>
                        <div class="form-group col-md-8 col-12">
                        <input id="email" type="email" class="form-control" value="{{ $email }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label for="phone">Phone</label>
                        </div>
                        <div class="form-group col-md-8 col-12">
                            <input id="phone" type="text" class="form-control" value="{{ $phone }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label for="bio">Bio</label>
                        </div>
                        <div class="form-group col-md-8 col-12">
                            <textarea id="bio"  class="form-control" >{{ $bio }}</textarea>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label for="bio">More Details about you </label>
                        </div>
                        <div class="form-group col-md-8 col-12">
                            <textarea id="more_about" class="form-control summernote-simple"> {{ $somthing_about }} </textarea>
                        </div>
                    </div>
                   
                </div>
                <div class="card-footer text-right">
                  <button onclick="updateUserData()" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
            {{-- change password  --}}
            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab2">
                <div class="card-header">
                    <h4>Change Password</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                        <label for="c_pass">Current Password</label>
                        </div>
                        <div class="form-group col-md-8 col-12">
                        <input id="c_pass" type="password" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label for="n_pass">New Password</label>
                        </div>
                        <div class="form-group col-md-8 col-12">
                            <input id="n_pass" type="password" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                <button onclick="changeUserPassword();" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
             {{-- change Photo  --}}
             <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab2">
                <div class="card-header">
                    <h4>Change Photo</h4>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="image-upload">Photo</label>
                            <img style="object-fit: contain; width:100%" alt="image" src="
                            @if ($photo != null)
                                {{asset('public/'.$photo)}}
                            @else
                                {{asset('public/admin_assets/img/profesor.jpg')}}
                            @endif
                        " class=" author-box-picture">
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input name="image" type="file" id="image-upload">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                <button onclick="changeUserImage();" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
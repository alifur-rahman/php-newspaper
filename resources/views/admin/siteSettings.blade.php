@extends('admin/Layout.app');
@section('title', 'Site Settings')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
                <div class="card-header">
                    <h4>Site Settings </h4>
                   
                </div>
                <div class="card-body">
                    
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label"> Website Title </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="website_title" value=" {{ $website_title }} ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="website_logo" class="col-sm-3 col-form-label"> logo Preview </label>
                        <div class="col-sm-9">
                            <img id='website_logo_preview' style="max-height: 200px; max-width:100%" src=" {{asset('public/'.$website_logo)}}"  for="website_logo" alt="Logo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="website_logo" class="col-sm-3 col-form-label">Website Logo</label>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="website_logo" >
                                <input type="hidden" id="Unset_website_logo" value="{{asset('public/'.$website_logo)}}">
                                <label class="custom-file-label" for="website_logo">Choose file</label>
                              </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="footer_logo"  class="col-sm-3 col-form-label">Footer logo Preview </label>
                        <div class="col-sm-9">
                            <img id="footer_logo_preview" style="background: gray; padding:15px; max-height: 200px; max-width:100% " src=" {{asset('public/'.$footer_logo)}}" alt="Logo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="footer_logo" class="col-sm-3 col-form-label">Footer logo</label>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="footer_logo">
                                <label class="custom-file-label" for="footer_logo">Choose file</label>
                              </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="favicon_icon" class="col-sm-3 col-form-label"> Favicon Preview </label>
                        <div class="col-sm-9">
                            <img id="favicon_icon_preview" style="max-height: 100px; max-width:100%" src=" {{asset('public/'.$favicon_icon)}}" alt="Logo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="favicon_icon"  class="col-sm-3 col-form-label">Favicon</label>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="favicon_icon">
                                <label class="custom-file-label" for="favicon_icon">Choose file</label>
                              </div>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Website Time Zone</label>
                        <div class="col-sm-9">
                            <select class="form-control selectric">
                                <option selected="">Asia/Dhaka</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
                    </div> --}}
                </div>
                <div class="card-footer">
                    <button type="submit" onclick="updateSiteSetting();" class="btn btn-primary">Update</button>
                </div>
                <div id="success-msg">
                    <img width="200" height="200" src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif" alt="">
              </div>    
          </div>
    </div>
</div>
@endsection
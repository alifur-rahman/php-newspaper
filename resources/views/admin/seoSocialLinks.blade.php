@extends('admin/Layout.app');
@section('title', 'Social Links')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
                
                <div class="card-header">
                    <h4>Social Link </h4>
                </div>
                <div class="card-body">
                    
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Facebook</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="facebook" placeholder="Ex: https://www.facebook.com/username/" value=" {{$facebook}} ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Twitter</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="twitter" placeholder="Ex: https://www.twitter.com/username/" value="{{$twitter}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Linkedin</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="linkedin"  placeholder="Ex: https://www.linkedin.com//username/" value="{{$linkedin}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Pinterest</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="printerest"  placeholder="Ex: https://www.pinterest.com/username/" value="{{$printerest}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Vimemo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="vimemo"  placeholder="Ex: https://vimeo.com/username/" value="{{$vimemo}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Youtube</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="youtube"  placeholder="Ex: https://www.youtube.com/username/" value="{{$youtube}}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button onclick="updateSocialLinkData();" type="submit" class="btn btn-primary">Update</button>
                </div>
                <div id="success-msg">
                    <img width="200" height="200" src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif" alt="">
                </div>
          </div>
    </div>
</div>
@endsection
@extends('admin/Layout.app');
@section('title', 'Social Pages')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
                <div id="success-msg">
                    <img width="200" height="200" src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif" alt="">
                </div>
                <div class="card-header">
                    <h4>Social Page </h4>
                </div>
                <div class="card-body">
                    
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Facebook Page Url</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="facebook_page_url" placeholder="Ex: https://www.facebook.com/pagemane/" value=" {{$facebook_page_url}} ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Twitter Page Url</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="twitter_page_url" placeholder="Ex:  https://twitter.com/pagename/" value=" {{$twitter_page_url}} ">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                <button onclick="updateSocialPageData()" type="submit" class="btn btn-primary">Update</button>
                </div>
          </div>
    </div>
</div>
@endsection
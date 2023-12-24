@extends('admin/Layout.app');
@section('title', 'SEO meta settings ')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                    <div id="success-msg">
                        <img width="200" height="200" src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif" alt="">
                  </div>
                    <div class="card-header">
                        <h4>Meta Settings </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Meta Keyword</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"   id="meta_keyword" cols="30" rows="10"> {{$meta_keyword}} </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="meta_description" cols="30" rows="10"> {{$meta_description}} </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Google Analytics Id</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="google_analytics_ID" value="{{$google_analytics_ID}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit" onclick="updateMetaSetting();" class="btn btn-primary">Update</button>
                    </div>
              </div>
        </div>
    </div>
@endsection
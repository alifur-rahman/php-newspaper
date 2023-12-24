@extends('admin/Layout.app');
@section('title', 'Panel settings')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div id="success-msg">
                <img width="200" height="200" src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif" alt="">
              </div>
                <div class="card-header">
                    <h4>Panel Settings </h4>
                </div>
                <div class="card-body">
                    
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Theme color</label>
                        <div class="col-sm-9">
                            <input type="color" class="form-control" id="theme_color" value="{{$theme_color}}">
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                <button type="submit" onclick="updatePanelSetting()" class="btn btn-primary">Update</button>
                </div>
          </div>
    </div>
</div>
@endsection
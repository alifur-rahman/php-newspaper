@extends('admin/Layout.app')
@section('title', 'Create a new ads')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
           
            <div class="card-header">
                <h4>Submit New Ads</h4>
            </div>
            <div class="card-body">
                <div class="form-group ">
                  <label class="col-form-label ">Page</label>
                  <select onchange="positionByPage(this.value)"  id="Page" class="form-control selectric">
                    <option value="null">Select</option>
                    @foreach ($PageData as $PageData)
                      <option value="{{$PageData->page_name}}"> {{$PageData->page_name}} </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group " id="position_wrapper">
                  <label class="col-form-label ">Ads Position</label>
                  <select id="Position" class="form-control selectric">
                    <option value="">Select</option>
                  </select>
                </div>

                <div class="form-group" >
                  <label class="col-form-label ">Expair At</label>
                  <input type="text" id="expair_at" class="form-control datepicker">
                </div>

                <div class="form-group ">
                  <label class="col-form-label ">Ads Type</label>
                  <select onchange="ads_type_input(this.value)" id="adsType" class="form-control selectric">
                    <option value="">Select</option>
                    <option value="google">Google Ads</option>
                    <option value="image">Image Ads</option>
                    <option value="script">Script</option>
                  </select>
                </div>

                <div class="hidden-input-wapper" id="input_hidden_wrapper">
                  <div class="form-group hide" id="google" >
                    <label class="col-form-label ">Google ad client</label>
                    <input required type="text" class="form-control" id="googleClint">
                    <small>[ Like this ca-pub-2922170655495017 ]</small>
                  </div>
                  <div id="image" class="hide">
                    <div class="form-group" >
                      <label class="col-form-label ">Image</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                      <small>[ jpg,png,jpeg,gif and max size is 1MB]</small>
                    </div>
                    <div class="form-group" >
                      <label class="col-form-label ">URL</label>
                      <input type="text" class="form-control" id="URL">
                    </div>
                  </div>
                  <div class="form-group hide" id="script" >
                    <label class="col-form-label ">Add Your Script</label>
                    <textarea required type="text" class="form-control" id="scriptValue"></textarea>
                  </div>

                </div>
            
            </div>
            <div class="card-footer text-right">
                <button onclick="submiteNewAds()" class="btn btn-primary mr-1" >Submit</button>
            </div>
            <div id="success-msg">
              <img width="200" height="200" src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif" alt="">
            </div>   
    </div>
</div>
  </div>
@endsection
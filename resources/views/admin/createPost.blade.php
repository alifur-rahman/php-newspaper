@extends('admin/Layout.app')
@section('title', 'Create new news post')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Create Your Post</h4>
         
        </div>
        <div class="card-body">

          <div class="form-group row mb-4">
            <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Language / ভাষা </label>
            <div class="selectgroup lag-selecGroup">
              <label class="selectgroup-item select_redio_lag_name">
                <input type="radio" name="language" value="bn" class="selectgroup-input-radio" checked="">
                <span class="selectgroup-button">BN</span>
              </label>
              <label class="selectgroup-item select_redio_lag_name">
                <input type="radio" name="language" value="en" class="selectgroup-input-radio">
                <span class="selectgroup-button">EN</span>
              </label>
            </div>
          </div>

          
          

          {{-- English inputs  --}}
          <div class="news_language_input en">
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Title</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" id="post_title" name="post_title" class="form-control">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="headline" >
                  <label class="custom-control-label" for="headline">Make headline</label>
                </div>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Category</label>
              <div class="col-sm-12 col-md-7" >
                <select id="category" name="category" class="form-control selectric">
                 
                </select>
              </div>
              
            </div>

            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Publish at</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" id="publish_at" class="form-control datepicker" autocomplete="off">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Short Description</label>
              <div class="col-sm-12 col-md-7">
                <textarea id="short_description" name="short_description"  class="form-control " ></textarea>
              </div>
            </div>

            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Full Description</label>
              <div class="col-sm-12 col-md-7">
                <textarea id="post_content" name="post_content" class="summernote-simple"></textarea>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Thumbnail</label>
              <div class="col-sm-12 col-md-7">
                <div id="image-preview" class="image-preview">
                  <label for="image-upload" id="image-label">Choose File</label>
                  <input  name="image" type="file" name="image" id="image-upload" />
                </div>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Tags</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" id="tags" name="tags" class="form-control inputtags">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Status</label>
              <div class="col-sm-12 col-md-7">
                <select id="status" name="status" class="form-control selectric">
                  <option value="Publish">Publish</option>
                  <option value="Draft">Draft</option>
                  <option value="Pending">Pending</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3" >Advanced</label>
              <div class="col-sm-12 col-md-7">
                <div class="row">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="featured_news">
                      <label class="custom-control-label" for="featured_news">Featured News / আলোচিত সংবাদ</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="most_popular">
                      <label class="custom-control-label" for="most_popular">Most Popular / সবচেয়ে জনপ্রিয়</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="hot_news">
                      <label class="custom-control-label" for="hot_news">Hot News / গরম খবর</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="new_trends">
                      <label class="custom-control-label" for="new_trends">New Trends / নতুন প্রবণতা</label>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
           
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <input type="submit" onclick="sendNewsPostData()" class="btn btn-primary" value="Create Post">
              </div>
            </div>
            <div id="success-msg">
              <img width="200" height="200" src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif" alt="">
            </div>
          </div>
          {{-- end English inputs  --}}
        </div>
      </div>
    </div>
  </div>
@endsection
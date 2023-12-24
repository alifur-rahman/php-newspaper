@extends('admin/Layout.app')
@section('title', 'Add New ePapper')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Add New</h4>
         
        </div>
        <div class="card-body">
          <div class="news_language_input en">
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Title</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" id="e_title" name="" class="form-control">
              
              </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Image</label>
                <div class="col-sm-12 col-md-7">
                    <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input  name="image" type="file" name="image" id="image-upload" />
                    </div>
                </div>
            </div>

            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Publish at</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" id="publish_at" class="form-control datepicker" autocomplete="off">
              </div>
            </div>

            <div class="form-group row mb-4">
              <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <input type="submit" onclick="sendEpapperData()" class="btn btn-primary" value="Create Post">
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
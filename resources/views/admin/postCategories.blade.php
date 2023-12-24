@extends('admin/Layout.app')
@section('title', 'Post Category')
@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Category List</h4>
              <div class="">
                <div class="selectgroup lag-selecGroup">
                  <label class="selectgroup-item select_redio_lag_name m-0">
                    <input type="radio" name="Show_cat_by_lang" value="bn" class="selectgroup-input-radio" checked="">
                    <span class="selectgroup-button">BN</span>
                  </label>
                  <label class="selectgroup-item select_redio_lag_name m-0">
                    <input type="radio" name="Show_cat_by_lang" value="en" class="selectgroup-input-radio">
                    <span class="selectgroup-button">EN</span>
                  </label>
                </div>
              </div>
            </div>
            
            <style>
                .dataTables_length {
                    display: none;
                }
            </style>

            {{-- bangla category table  --}}
            <div class="banglaCat_table " id="show-bn">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Create At</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($allCatBnData as $allCatBnData)
                      <tr>
                        <td> {{$allCatBnData->Name}} </td>
                        <td> {{$allCatBnData->created_at}} </td>
                        <td>
                          @if ($allCatBnData->status == 'Published')
                              <div class="badge badge-success"> {{$allCatBnData->status}} </div>
                          @elseif ($allCatBnData->status == 'Draft')
                              <div class="badge badge-danger"> {{$allCatBnData->status}} </div>
                          @elseif ($allCatBnData->status == 'Pending')
                              <div class="badge badge-warning"> {{$allCatBnData->status}} </div>
                          @else 
                              <div class="badge badge-light"> {{$allCatBnData->status}} </div>
                          @endif
                        </td>
                        <td> 
                          <div class="buttons d-flex">
                              <a href="/admin/news/post-categories/edit/{{base64_encode($allCatBnData->id)}} " class="btn btn-icon  btn-primary"><i class="far fa-edit"></i></a>
                              <a href="/admin/news/post-categories/delete/{{base64_encode($allCatBnData->id)}}" onclick="return confirm('are you sure?')" class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i></a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
             {{-- E category table  --}}
             <div class="EnglishCat_table hide" id="show-en">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1-en">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Create At</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($allCatEnData as $allCatEnData)
                      <tr>
                        <td> {{$allCatEnData->Name}} </td>
                        <td> {{$allCatEnData->created_at}} </td>
                        <td>
                          @if ($allCatEnData->status == 'Published')
                              <div class="badge badge-success"> {{$allCatEnData->status}} </div>
                          @elseif ($allCatEnData->status == 'Draft')
                              <div class="badge badge-danger"> {{$allCatEnData->status}} </div>
                          @elseif ($allCatEnData->status == 'Pending')
                              <div class="badge badge-warning"> {{$allCatEnData->status}} </div>
                          @else 
                              <div class="badge badge-light"> {{$allCatEnData->status}} </div>
                          @endif
                        </td>
                        <td> 
                          <div class="buttons d-flex">
                              <a href="/admin/news/post-categories/edit/{{base64_encode($allCatEnData->id)}} " class="btn btn-icon  btn-primary"><i class="far fa-edit"></i></a>
                              <a href="/admin/news/post-categories/delete/{{base64_encode($allCatEnData->id)}}" onclick="return confirm('are you sure?')" class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i></a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          

          </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
                <div id="success-msg">
                  <img width="200" height="200" src="https://cdn.dribbble.com/users/1283437/screenshots/4486866/checkbox-dribbble-looped-landing.gif" alt="">
                </div>
                <div class="card-header">
                    <h4>Add new Category</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <label>For Language</label> <br>
                      <div class="selectgroup lag-selecGroup">
                        <label class="selectgroup-item select_redio_lag_name">
                          <input type="radio" name="cat_lang" value="bn" class="selectgroup-input-radio" checked="">
                          <span class="selectgroup-button">BN</span>
                        </label>
                        <label class="selectgroup-item select_redio_lag_name">
                          <input type="radio" name="cat_lang" value="en" class="selectgroup-input-radio">
                          <span class="selectgroup-button">EN</span>
                        </label>
                      </div>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input name="cat_name" required id="cat_name" type="text" class="form-control">
                    </div>
                   
               
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="cat_desc" id='cat_desc' class="form-control"></textarea>
                    </div>
                    <div class="form-group ">
                        <label class="col-form-label ">Category</label>
                          <select name="cat_status" id="cat_status" class="form-control selectric">
                            <option value="Published">Published</option>
                            <option value="Draft">Draft</option>
                            <option value="Pending">Pending</option>
                          </select>
                      </div>
                
                </div>
                <div class="card-footer text-right">
                    <button onclick="sendCatData()" class="btn btn-primary mr-1" >Submit</button>
                </div>      
        </div>
    </div>
</div>
@endsection
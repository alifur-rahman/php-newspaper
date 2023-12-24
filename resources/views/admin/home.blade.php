@extends('admin/Layout.app')
@section('title', 'Analytics Dashboard')
@section('content')
<div class="row ">
  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="card">
      <div class="card-statistic-4">
        <div class="align-items-center justify-content-between">
          <div class="row ">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
              <div class="card-content">
                <h5 class="font-15">Total Post</h5>
                <h2 class="mb-3 font-18"> {{$total_post}} </h2>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
              <div class="banner-img">
                <img src=" {{asset('public/admin_assets/img/banner/1.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="card">
      <div class="card-statistic-4">
        <div class="align-items-center justify-content-between">
          <div class="row ">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
              <div class="card-content">
                <h5 class="font-15">Today's Post</h5>
                <h2 class="mb-3 font-18"> {{$today_post}} </h2>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
              <div class="banner-img">
                <img src=" {{asset('public/admin_assets/img/banner/5.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="card">
      <div class="card-statistic-4">
        <div class="align-items-center justify-content-between">
          <div class="row ">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
              <div class="card-content">
                <h5 class="font-15"> Total Visitors </h5>
                <h2 class="mb-3 font-18"> {{$total_visitor}} </h2>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
              <div class="banner-img">
                <img src=" {{asset('public/admin_assets/img/banner/2.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="card">
      <div class="card-statistic-4">
        <div class="align-items-center justify-content-between">
          <div class="row ">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
              <div class="card-content">
                <h5 class="font-15">Today's Visitors</h5>
                <h2 class="mb-3 font-18"> {{$today_visitor}} </h2>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
              <div class="banner-img">
                <img src="{{asset('public/admin_assets/img/banner/3.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<div class="row">
  <div class="col-md-6 col-lg-12 col-xl-6">
    <!-- Support tickets -->
    <div class="card">
      <div class="card-header">
        <h4>Today's Letest News</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="todayDatatable">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Create At</th>
                <th>Views</th>
                <th>Category</th>
              </tr>
            </thead>
            <tbody>
              <?php  $id = 1 ?>
              @foreach ($today_letest_post as $today_letest_post)

              <tr>
                <td>{{$id++}}</td>
                <td><a href="#"> {{$today_letest_post->post_title}} </a></td>
                <td>{{$today_letest_post->created_at}} </td>
                <td>{{$today_letest_post->view}}</td>
                <td>{{$today_letest_post->catagories}}</td>
              </tr>

              @endforeach



            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Support tickets -->
  </div>
  <div class="col-md-6 col-lg-12 col-xl-6">
    <!-- Support tickets -->
    <div class="card">
      <div class="card-header">
        <h4>Today's Popular News</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Create At</th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1; ?>
              @foreach ($most_popular as $item)
              <tr>
                <td>{{ $id++ }}</td>
                <td><a target="_blank"
                    href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}"> {{
                    $item->post_title }} </a></td>
                <td>{{ $item->created_at }}</td>
              </tr>
              @endforeach




            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Support tickets -->
  </div>

  <div class="col-md-12 ">
    <div class="card">
      <div class="card-header">
        <h4>Top Most Visited News</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>
              <?php $id=1; ?>
              @foreach ($most_view_Array as $item)
              <tr>
                <td>{{ $id++ }}</td>
                <td><a target="_blank"
                    href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}"> {{
                    $item->post_title }} </a></td>
                <td>{{ $item->view }}</td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
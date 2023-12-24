@extends('user/Layout.app')
@section('title', 'User Home')
@section('content')
<div class="row ">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Your Subscription</h5>
                  <h2 class="mb-3 font-18">258</h2>
                  <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{asset('public/admin_assets/img/banner/1.png')}}" alt="">
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
                  <h5 class="font-15"> Activity</h5>
                  <h2 class="mb-3 font-18">1,287</h2>
                  <p class="mb-0"><span class="col-orange">09%</span> Decrease</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{asset('public/admin_assets/img/banner/2.png')}}" alt="">
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
                  <h5 class="font-15">Today Activity</h5>
                  <h2 class="mb-3 font-18">128</h2>
                  <p class="mb-0"><span class="col-green">18%</span>
                    Increase</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{asset('public/admin_assets/img/banner/4.png')}}" alt="">
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
                  <h5 class="font-15">Last date of subscription</h5>
                  <h2 class="mb-3 font-18">$48,697</h2>
                  <p class="mb-0"><span class="col-green">42%</span> Increase</p>
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
          <h4>Subscription Support Ticket</h4>
          <form class="card-header-form">
            <input type="text" name="search" class="form-control" placeholder="Search">
          </form>
        </div>
        <div class="card-body">
          <div class="support-ticket media pb-1 mb-3">
            <img src="{{asset('public/admin_assets/img/users/user-1.png')}}" class="user-img mr-2" alt="">
            <div class="media-body ml-3">
              <div class="badge badge-pill badge-success mb-1 float-right">Feature</div>
              <span class="font-weight-bold">#89754</span>
              <a href="javascript:void(0)">Please add advance table</a>
              <p class="my-1">Hi, can you please add new table for advan...</p>
              <small class="text-muted">Created by <span class="font-weight-bold font-13">John
                  Deo</span>
                &nbsp;&nbsp; - 1 day ago</small>
            </div>
          </div>
          <div class="support-ticket media pb-1 mb-3">
            <img src="{{asset('public/admin_assets/img/users/user-2.png')}}" class="user-img mr-2" alt="">
            <div class="media-body ml-3">
              <div class="badge badge-pill badge-warning mb-1 float-right">Bug</div>
              <span class="font-weight-bold">#57854</span>
              <a href="javascript:void(0)">Select item not working</a>
              <p class="my-1">please check select item in advance form not work...</p>
              <small class="text-muted">Created by <span class="font-weight-bold font-13">Sarah
                  Smith</span>
                &nbsp;&nbsp; - 2 day ago</small>
            </div>
          </div>
          <div class="support-ticket media pb-1 mb-3">
            <img src="{{asset('public/admin_assets/img/users/user-3.png')}}" class="user-img mr-2" alt="">
            <div class="media-body ml-3">
              <div class="badge badge-pill badge-primary mb-1 float-right">Query</div>
              <span class="font-weight-bold">#85784</span>
              <a href="javascript:void(0)">Are you provide template in Angular?</a>
              <p class="my-1">can you provide template in latest angular 8.</p>
              <small class="text-muted">Created by <span class="font-weight-bold font-13">Ashton Cox</span>
                &nbsp;&nbsp; -2 day ago</small>
            </div>
          </div>
          <div class="support-ticket media pb-1 mb-3">
            <img src="{{asset('public/admin_assets/img/users/user-6.png')}}" class="user-img mr-2" alt="">
            <div class="media-body ml-3">
              <div class="badge badge-pill badge-info mb-1 float-right">Enhancement</div>
              <span class="font-weight-bold">#25874</span>
              <a href="javascript:void(0)">About template page load speed</a>
              <p class="my-1">Hi, John, can you work on increase page speed of template...</p>
              <small class="text-muted">Created by <span class="font-weight-bold font-13">Hasan
                  Basri</span>
                &nbsp;&nbsp; -3 day ago</small>
            </div>
          </div>
        </div>
        <a href="javascript:void(0)" class="card-footer card-link text-center small ">View
          All</a>
      </div>
      <!-- Support tickets -->
    </div>
    <div class="col-md-6 col-lg-12 col-xl-6">
      <div class="card">
        <div class="card-header">
          <h4>Subscription History</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Package Name</th>
                  <th>Date</th>
                  <th>Payment Method</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Package 1</td>
                  <td>11-08-2018</td>
                  <td>NEFT</td>
                  <td>$258</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Package 2
                  </td>
                  <td>15-07-2018</td>
                  <td>PayPal</td>
                  <td>$125</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    Package 3
                  </td>
                  <td>25-08-2018</td>
                  <td>RTGS</td>
                  <td>$287</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>
                    Package 4
                  </td>
                  <td>01-05-2018</td>
                  <td>CASH</td>
                  <td>$170</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>
                    Package 5
                  </td>
                  <td>18-04-2018</td>
                  <td>NEFT</td>
                  <td>$970</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>
                    Package 6
                  </td>
                  <td>22-11-2018</td>
                  <td>PayPal</td>
                  <td>$854</td>
                </tr>
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
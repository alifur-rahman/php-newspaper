<?php 
use App\Models\site_settings_model;
use App\Models\user_table_model;
use Illuminate\Http\Request;
$siteSettingData  =site_settings_model::where('id','=',1)->get(); // first index all data off site Setting table
$website_logo = $siteSettingData[0]['website_logo']; // website logo

// admin table data 
$user_image_result =  user_table_model::select('photo')->where('id','=',session('outerUserID'))->get();
$photo = $user_image_result[0]['photo'];
?>



<div class="loader"></div>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
              <li><a target="_blank" href="/" class="nav-link nav-link-lg view-websites-btn ">
                <i data-feather="globe"></i> &nbsp; View Website 
              </a></li>
            
          </ul>
        </div>
        <ul class="navbar-nav navbar-right align-items-center">
          <li class="dropdown">
            <!-- partial:index.partial.html -->
              <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
          </li>
         
         
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src=" @if ($photo != null)
              {{asset('public/'.$photo)}}
          @else
              {{asset('public/admin_assets/img/profesor.jpg')}}
          @endif"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello </div>
                <a href="{{ url('user/profile/view') }}" class="dropdown-item has-icon"> <i class="far
                      fa-user"></i> Profile
                </a>
              <div class="dropdown-divider"></div>
              <a href=" {{url('user/logout')}} " class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{url('/user/home')}}"> <img alt="image" src="{{asset('public/'.$website_logo)}}" class="header-logo" /> <span
                class="logo-name"></span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>



            <li class="dropdown">
              <a href="{{url('/user/home')}}" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown">User Option</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="/user/pricing">Subscribe</a></li>
              </ul>
            </li>
         

          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
   

<?php 
use App\Models\site_settings_model;
use App\Models\role_by_permission_table_model;
use App\Models\dashboard_modules_table_model;
use App\Models\admin_table_model;
use Illuminate\Http\Request;
$siteSettingData  =site_settings_model::where('id','=',1)->get(); // first index all data off site Setting table
$website_logo = $siteSettingData[0]['website_logo']; // website logo
// show modules 
$PermissionTableData = role_by_permission_table_model::select('active_modules')->where('id','=',session('role_id'))->get();
foreach($PermissionTableData as $key){
  $active_modules = $key['active_modules'];
}
$values = explode(",", $active_modules);
$valueCout = count($values);
$AlldataArray = array();
$data = array();
for ($i=0; $i < $valueCout; $i++) { 
  ${'dyV' . $values[$i]} = dashboard_modules_table_model::select('module_name','parents','slug','icon')->where('parents','=',$values[$i])->get();
  foreach (${'dyV' . $values[$i]} as $client) {  
    array_push($data,[
      'module_name' => $client['module_name'],
      'slug' => $client['slug'],
    ]);

  }
  array_push($AlldataArray,[
    'parents'=> $client['parents'],
    'icon'=>$client['icon'],
    'result'=>$data
  ]);
  $data = array();

}




// admin table data 
$user_image_result =  admin_table_model::select('photo')->where('id','=',session('UserID'))->get();
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
              <div class="dropdown-title">Hello  {{ session()->get('name') }}</div>
                <a href="{{ url('admin/profile/view') }}" class="dropdown-item has-icon"> <i class="far
                      fa-user"></i> Profile
                </a>
              <div class="dropdown-divider"></div>
              <a href=" {{url('admin/logout')}} " class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{url('/admin')}}"> <img alt="image" src="{{asset('public/'.$website_logo)}}" class="header-logo" /> <span
                class="logo-name"></span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>



            <li class="dropdown">
              <a href="{{url('/admin')}}" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            </li>

         
          @foreach ($AlldataArray as $item)
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown">{!! $item['icon'] !!}<span>{{ str_replace('-',' ',$item['parents'])}}</span></a>
              <ul class="dropdown-menu">
                @foreach ($item['result'] as $items)
                  <li><a class="nav-link" href=" {{url($items['slug'])}}">{{ str_replace('-', ' ', $items['module_name'])  }}</a></li>
                @endforeach
              </ul>
            </li>
          @endforeach

          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
   

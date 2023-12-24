@extends('admin/Layout.app')
@section('title','Ads List')
@section('content')
{{-- @foreach ($allAdsData as $allAdsData) --}}
<div class="row mt-4">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex">
        <h4>Ads List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
            <thead>
              <tr>
                <th>Ads Position</th>
                <th>Ads Type</th>
                <th>Image/Client ID</th>
                <th>Expair at</th>
                <th>Created at</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($allAdsData as $allAdsData)
              <tr>
                <td> {{$allAdsData->position}} </td>
                <td> {{$allAdsData->ads_type}} </td>
                <td>
                 @if ($allAdsData->image != null)
                    <img width="70" src=" {{asset('public/'.$allAdsData->image) }}"> 
                 @elseif($allAdsData->google_ad_client != null)
                     {{$allAdsData->google_ad_client}}
                  @else
                  -
                 @endif
                  </td>
                <td>{{$allAdsData->expair_at}} </td>
                <td>{{$allAdsData->created_at}}</td>
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
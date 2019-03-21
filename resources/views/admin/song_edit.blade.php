@extends('admin.layouts.app')
  @section('title')
      <title>Song Edit</title>
  @endsection
  @section('content-title')
      <h1><i class="fa fa-dashboard"></i> Song Edit</h1>
      <p>You can use upload your songs</p>
  @endsection
  @section('breadcrumb')
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item">Edit</li>
      <li class="breadcrumb-item">Song Edit</li>
  @endsection
  @section('content')    
        <div class="row">
          <div class="col-md-6">
            <div class="tile">
              <h3 class="tile-title">Song Upload</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="tile">
              <h3 class="tile-title">Song List</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
              </div>
            </div>
          </div>
        </div>
    </main>
  @endsection
  

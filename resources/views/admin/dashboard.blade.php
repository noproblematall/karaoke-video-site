@extends('admin.layouts.app')
  @section('title')
      <title>Dashboard</title>
  @endsection
  @section('content-title')
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      <p>You can use this dashboard</p>
  @endsection
  @section('breadcrumb')
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Dashboard</li>
  @endsection
  @section('content')    
        <div class="row">
          <div class="col-md-6">
            <div class="tile">
              <h3 class="tile-title">Monthly Sales</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="tile">
              <h3 class="tile-title">Support Requests</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
              </div>
            </div>
          </div>
        </div>
    </main>
  @endsection
  

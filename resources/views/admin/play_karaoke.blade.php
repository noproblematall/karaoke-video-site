@extends('admin.layouts.app')
  @section('title')
      <title>Karaoke Player</title>
  @endsection
  @section('content-title')
      <h1><i class="fa fa-play-circle-o"></i></i> Karaoke Player</h1>
      <p>You can use this karaoke player</p>
  @endsection
  @section('alert')
    @if (Session::get('success'))
    {{-- <script> var alertflag = 1; </script> --}}
    <div class="alert alert-success alert-block" style="margin:0;display:none;">
        <button type="button" class="close" data-dismiss="alert">&nbsp;×</button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
  @endsection
  @section('breadcrumb')
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item">Player</li>
      <li class="breadcrumb-item">Karaoke Player</li>
  @endsection
  @section('content')    
        <div class="row">
          <div class="col-md-6">
            <div class="tile">
              <h3 class="tile-title">Play Sales</h3>
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
  

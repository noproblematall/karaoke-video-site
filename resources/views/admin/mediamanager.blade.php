@extends('admin.layouts.app')
  @section('title')
      <title>Media Manager</title>
  @endsection
  @section('content')    
        <div class="row">
          <div class="col-md-6">
            <div class="tile">
              <h3 class="tile-title">Media Manager</h3>
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
  

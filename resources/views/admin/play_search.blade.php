@extends('admin.layouts.app')
  @section('title')
      <title>Play</title>
  @endsection
  @section('content-title')
      <h1><i class="fa fa-search"></i> Search</h1>
      <p>You can search songs and upload into queue list</p>
  @endsection
  @section('alert')
    @if (Session::get('success'))
    {{-- <script> var alertflag = 1; </script> --}}
    <div class="alert alert-success alert-block" style="margin:0;display:none;">
        <button type="button" class="close" data-dismiss="alert">&nbsp;×</button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
    @if (Session::get('warning'))
    {{-- <script> var alertflag = 1; </script> --}}
    <div class="alert alert-warning alert-block" style="margin:0;display:none;">
        <button type="button" class="close" data-dismiss="alert">&nbsp;×</button>
        <strong>{{ Session::get('warning') }}</strong>
    </div>
    @endif
  @endsection
  @section('breadcrumb')
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item">Player</li>
      <li class="breadcrumb-item">Search</li>
  @endsection
  @section('content')    
        <div class="row">
          <div class="col-md-6">
            <div class="tile">
              <h3 class="tile-title line-head">Karaoke Search</h3>
            <form class="form-horizontal" id="karaokeform" action="{{route('admin.play.addqueue')}}" method="post">
                @csrf
                <div class="form-group row">
                  <label class="control-label col-md-2">Karaoke Title</label>
                  <div class="col-md-10">
                    <input class="form-control" type="text" id="search" name="search" autocomplete="off" placeholder="Enter karaoke title for karaoke search...">
                  </div>
                </div>
                <div class="form-group">
                  {{-- <label for="exampleSelect2"></label> --}}
                  <select class="form-control{{ $errors->has('multititle') ? ' is-invalid' : '' }}" id="multititle" name="multititle[]" multiple="multiple" style="height:160px;" disabled>
                    <option value="">No item</option>
                    
                  </select>
                  @if ($errors->has('multititle'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('multititle') }}</strong>
                      </span>
                  @endif
                </div>                
                <div class="row mb-10">
                  <div class="col-md-12">
                      <p class="bs-component">
                          <button class="btn btn-primary btn-lg btn-block" type="button" id="addqueue">Add Queue</button>
                      </p>
                  </div>
                </div>
              </form>
              <h3 class="tile-title line-head"></h3>
            <form action="{{route('admin.play.addmultiqueue')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleSelect1">Super Category</label>
                  <select class="form-control{{ $errors->has('supersearch') ? ' is-invalid' : '' }}" id="supersearch" name="supersearch">
                      <option value="">Please select</option>
                      @isset($results)
                        @forelse($results as $result)
                          <option value="{{$result->id}}">{{$result->super_category_name}}</option>
                        @empty
                          <option value="">Please register Super category !</option>
                        @endforelse
                      @endisset
                  </select>
                  @if ($errors->has('supersearch'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('supersearch') }}</strong>
                    </span>
                  @endif
                  <label for="exampleSelect1">Normal Category</label>
                  <select class="form-control" id="normalsearch" name="normalsearch" disabled>
                    <option>First, Please select Super Category</option>                    
                  </select>
                </div>
                <div class="form-group">
                  {{-- <label for="exampleSelect2"></label> --}}
                  <select class="form-control{{ $errors->has('multiselect') ? ' is-invalid' : '' }}" id="multiselect" name="multiselect[]" multiple="" style="height:160px;" disabled>
                    <option value="">No item</option>
                    
                  </select>
                  @if ($errors->has('multiselect'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('multiselect') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="row mb-10">
                  <div class="col-md-12">
                      <p class="bs-component">
                          <button class="btn btn-primary btn-lg btn-block" type="submit" id="addmultiqueue">Add Queue</button>
                      </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="tile">
              <h3 class="tile-title line-head">Song Search</h3>
              <form class="form-horizontal" action="" method="post">
                <div class="form-group row">
                  <label class="control-label col-md-2">Song Title</label>
                  <div class="col-md-10">
                    <input class="form-control" type="text" autocomplete="off" id="songsearch" name="songsearch" placeholder="Enter song title for song search...">
                  </div>                  
                </div>
                <div class="row mb-10">
                  <div class="col-md-12">
                      <p class="bs-component">
                          <button class="btn btn-primary btn-lg btn-block" type="submit" id="addsongqueue" disabled>Add Queue</button>
                      </p>
                  </div>
                </div>
              </form>
              <h3 class="tile-title line-head"></h3>
              <form action="" method="post">
                <div class="form-group">
                  <label for="exampleSelect1">Super Category</label>
                  <select class="form-control" id="supersong" name="supersong">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                  <label for="exampleSelect1">Normal Category</label>
                  <select class="form-control" id="normalsong" name="normalsong" disabled>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  {{-- <label for="exampleSelect2"></label> --}}
                  <select class="form-control" id="multisong" name="multisong" multiple="" style="height:160px;" disabled>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="row mb-10">
                  <div class="col-md-12">
                      <p class="bs-component">
                          <button class="btn btn-primary btn-lg btn-block" type="submit" id="addmultisong" disabled>Add Queue</button>
                      </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </main>
  @endsection
  

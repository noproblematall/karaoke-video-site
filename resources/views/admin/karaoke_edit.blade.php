@extends('admin.layouts.app')
  @section('title')
      <title>Song Edit</title>
  @endsection
  @section('content-title')
      <h1><i class="fa fa-edit"></i> Karaoke Edit</h1>
      <p>You can use upload your karaokes</p>
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
      <li class="breadcrumb-item">Edit</li>
      <li class="breadcrumb-item">Karaoke Edit</li>
  @endsection
  @section('content')    
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="tile">
              <h3 class="tile-title">Karaoke Upload</h3>
            <form name="importform" action="{{route('admin.edit.karaoke.store')}}" method="post" enctype="multipart/form-data">
              @csrf
                  <div class="form-group">
                    <label class="control-label" for="title">Title</label>
                    <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" type="text" placeholder="Enter Song Title" value="{{old('title')}}">
                    @if ($errors->has('title'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('title') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="artist">Artist</label>
                    <input class="form-control{{ $errors->has('artist') ? ' is-invalid' : '' }}" id="artist" name="artist" type="text" placeholder="Enter Artist" value="{{old('artist')}}">
                    @if ($errors->has('artist'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('artist') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="code">Code</label>
                      <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" id="code" name="code" type="text" placeholder="Enter Code" value="{{old('code')}}">
                      @if ($errors->has('code'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('code') }}</strong>
                        </span>
                      @endif
                  </div>
                  <div class="form-group file1">
                      <label class="control-label">CDG file</label>
                      <input class="form-control{{ $errors->has('cdgfile') ? ' is-invalid' : '' }}" id="cdgfile" name="cdgfile" type="file">
                      @if ($errors->has('cdgfile'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cdgfile') }}</strong>
                        </span>
                      @endif
                  </div>
                  <div class="form-group file2">
                      <label class="control-label">MP3 file</label>
                      <input class="form-control{{ $errors->has('mp3file') ? ' is-invalid' : '' }}" id="mp3file" name="mp3file" type="file">
                      @if ($errors->has('mp3file'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mp3file') }}</strong>
                        </span>
                      @endif
                      <?php //dd($errors);?>
                  </div>
                  <div class="form-group">
                      <label for="superselect">Super Category</label>
                      <select class="form-control{{ $errors->has('superselect') ? ' is-invalid' : '' }}" id="superselect" name="superselect">
                        <option value="">Please select</option>
                        @isset($results)
                          @forelse($results as $result)
                            <option value="{{$result->id}}">{{$result->super_category_name}}</option>
                          @empty
                            <option value="">Please register Super category !</option>
                          @endforelse
                        @endisset
                        
                        </select>
                        @if ($errors->has('superselect'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('superselect') }}</strong>
                          </span>
                        @endif
                  </div>
                  <div class="form-group">
                      <label for="normalselect">Normal Category</label>
                      <select class="form-control{{ $errors->has('normalselect') ? ' is-invalid' : '' }}" id="normalselect" name="normalselect">
                        <option>First, Please select Super Category</option>
                        
                      </select>
                      @if ($errors->has('normalselect'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('normalselect') }}</strong>
                        </span>
                      @endif
                  </div>
                  <p class="bs-component">
                      <button class="btn btn-primary btn-lg btn-block" type="submit" id="song-import">Upload</button>
                  </p>
              </form>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="tile">
              <h3 class="tile-title">Karaoke List</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
              </div>
            </div>
          </div>
        </div>
    </main>
  @endsection
  

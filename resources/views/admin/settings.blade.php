@extends('admin.layouts.app')
  @section('title')
      <title>Settings</title>
  @endsection
  @section('content-title')
      <h1><i class="fa fa-cog"></i> Seetings</h1>
      <p>You can set your profile and categories</p>
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
      <li class="breadcrumb-item">Settings</li>
  @endsection
  @section('content')
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Super Category Upload</h3>
                    <form action="{{route('admin.settings.superstore')}}" method="post">
                      @csrf
                        <div class="form-group">
                            <label class="control-label" for="super">Super Category</label>
                            <input class="form-control{{ $errors->has('super') ? ' is-invalid' : '' }}" id="super" name="super" type="text" placeholder="Enter Super Category" value="{{old('super')}}" autocomplete="off" required>
                            @if ($errors->has('super'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('super') }}</strong>
                                </span>
                            @endif
                            </div>
                        <p class="bs-component">
                            <button class="btn btn-primary btn-lg btn-block" type="submit" id="super-import">Save</button>
                        </p>
                    </form>                      
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">Normal Category Upload</h3>
                        <form action="{{route('admin.settings.normalstore')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="supersetting">Super Category</label>
                                <select class="form-control{{ $errors->has('supersetting') ? ' is-invalid' : '' }}" id="supersetting" name="supersetting">
                                  <option value="">Please select</option>
                                  @isset($results)
                                    @forelse($results as $result)
                                      <option value="{{$result->id}}">{{$result->super_category_name}}</option>
                                    @empty
                                      <option value="">There is no item !</option>
                                    @endforelse
                                  @endisset
                                 
                                </select>
                                @if ($errors->has('supersetting'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('supersetting') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="normal">Normal Category</label>
                            <input class="form-control{{ $errors->has('normal') ? ' is-invalid' : '' }}" autocomplete="off" id="normal" name="normal" type="text" placeholder="Enter Super Category" value="{{old('normal')}}" required>
                                @if ($errors->has('normal'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('normal') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <p class="bs-component">
                                <button class="btn btn-primary btn-lg btn-block" type="submit" id="normal-import">Save</button>
                            </p>
                        </form>
                    </div>
                </div>
              </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                  <div class="tile user-settings">
                      <h4 class="line-head">Admin Profile</h4>
                      <form action="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                          <div class="col-md-6">
                            <label>Name</label>
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{$user['name']}}" autocomplete="off" required>
                            @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                            @endif
                          </div>    
                          <div class="clearfix"></div>
                          <div class="col-md-6">
                              <label>Email</label>
                              <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" autocomplete="off" type="email" name="email" value="{{$user['email']}}" required>
                              @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                          </div>                
                        </div>
                        <div class="row">                          
                          <div class="col-md-6 mb-4">
                            <label>Password</label>
                          <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" autocomplete="off" value="{{old('password')}}" type="password" name="password">
                            @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                            @endif
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6 mb-4">
                            <label>Confirm Password</label>
                            <input class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" type="password" name="password_confirmation" autocomplete="off" value="{{old('password_confirmation')}}">
                            @if ($errors->has('password_confirmation'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                              </span>
                            @endif
                          </div>
                          <div class="clearfix"></div>                          
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group file1">
                                  <label class="control-label">Profile Photo</label>
                                  <input class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" id="adminphoto" name="photo" type="file">
                                  @if ($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                  @endif
                              </div>
                          </div>
                        </div>
                        <div class="row mb-10">
                          <div class="col-md-12">
                              <p class="bs-component">
                                  <button class="btn btn-primary btn-lg btn-block" type="submit" id="adminsave">Save</button>
                              </p>
                          </div>
                        </div>
                      </form>
                  </div>
              </div>
            </div>
          </div>
        </div>        
    </main>
  @endsection
  
  
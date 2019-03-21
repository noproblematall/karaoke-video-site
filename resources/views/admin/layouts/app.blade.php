<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
  @yield('css')
  @yield('title')
</head>

<body class="app sidebar-mini rtl">
  <!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{url('/')}}">PVE</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      {{-- <li class="app-search">
        <input class="app-search__input" type="search" placeholder="Search">
        <button class="app-search__button"><i class="fa fa-search"></i></button>
      </li> --}}
      <!--Notification Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i
            class="fa fa-bell-o fa-lg"></i></a>
        <ul class="app-notification dropdown-menu dropdown-menu-right">
          <li class="app-notification__title">You have 4 new notifications.</li>
          <div class="app-notification__content">
            <li>
              <a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                    class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i
                      class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                <div>
                  <p class="app-notification__message">Lisa sent you a mail</p>
                  <p class="app-notification__meta">2 min ago</p>
                </div>
              </a>
            </li>
            <li>
              <a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                    class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i
                      class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                <div>
                  <p class="app-notification__message">Mail server not working</p>
                  <p class="app-notification__meta">5 min ago</p>
                </div>
              </a>
            </li>
            <li>
              <a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                    class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i
                      class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                <div>
                  <p class="app-notification__message">Transaction complete</p>
                  <p class="app-notification__meta">2 days ago</p>
                </div>
              </a>
            </li>
            <div class="app-notification__content">
              <li>
                <a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                      class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i
                        class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div>
                </a>
              </li>              
            </div>
          </div>
          <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
        </ul>
      </li>
      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
            class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
          <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>
          <li><a class="dropdown-item" href="{{ route('admin.auth.logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
            <form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user">
        @auth('admin')
          @php
              $current_user = Auth::user();
              $photo = $current_user->photo;
              $username = $current_user->name;
          @endphp
          <?php if(isset($photo) && $photo!=""):?>
            <img class="app-sidebar__user-avatar" src="<?php echo asset($photo);?>" alt="User Image">
          <?php else:?>
            <img class="app-sidebar__user-avatar" src="{{asset('images/dummy_photo.jpg')}}" alt="User Image"> 
          <?php endif;?>          
              <div>
                <p class="app-sidebar__user-name">{{$username}}</p>
                <p class="app-sidebar__user-designation">Administrator</p>
              </div>
        @endauth      
    </div>
    <ul class="app-menu">
      <li>
        <a class="app-menu__item active" href="{{route('admin.dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span
            class="app-menu__label">Dashboard</span>
        </a>
      </li>
      {{-- <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i
            class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i
            class="treeview-indicator fa fa-angle-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap
              Elements</a>
          </li>
          <li>
            <a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i
                class="icon fa fa-circle-o"></i> Font Icons</a>
          </li>
          <li>
            <a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a>
          </li>
          <li>
            <a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a>
          </li>
        </ul>
      </li> --}}
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-play"></i><span
            class="app-menu__label">Player</span><i
            class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('admin.play.karaoke')}}"><i class="icon fa fa-circle-o"></i> Karaoke Player</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('admin.play.song')}}" rel="noopener"><i
                        class="icon fa fa-circle-o"></i> Song Player</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('admin.play.searchview')}}" rel="noopener"><i
                        class="icon fa fa-circle-o"></i> Search</a>
                </li>
            </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span
            class="app-menu__label">Edit</span><i
            class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('admin.edit.karaoke')}}"><i class="icon fa fa-circle-o"></i> Karaoke Edit</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('admin.edit.song')}}" rel="noopener"><i
                        class="icon fa fa-circle-o"></i> Song Edit</a>
                </li>                
            </ul>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('admin.ads')}}"><i class="app-menu__icon fa fa-audio-description"></i><span
            class="app-menu__label">Ads</span></a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('admin.analytics')}}"><i class="app-menu__icon fa fa-line-chart"></i><span
            class="app-menu__label">Analytics</span></a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('admin.messages')}}"><i class="app-menu__icon fa fa-commenting-o"></i><span
                class="app-menu__label">Messages</span></a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('admin.mediamanager')}}"><i class="app-menu__icon fa fa-play-circle-o"></i><span
                class="app-menu__label">Media Manager</span></a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('admin.settings')}}"><i class="app-menu__icon fa fa-cog"></i><span
                class="app-menu__label">Settings</span></a>
        </li>
      {{-- <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i
            class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Forms</span><i
            class="treeview-indicator fa fa-angle-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Form
              Components</a>
          </li>
          <li>
            <a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a>
          </li>
          <li>
            <a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Form Samples</a>
          </li>
          <li>
            <a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Form
              Notifications</a>
          </li>
        </ul>
      </li> --}}
      
    </ul>
  </aside>
  <main class="app-content">
    <div class="app-title">
        <div>
            @yield('content-title')
            {{-- <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>You can use this dashboard</p> --}}
        </div>
        <div>
            @yield('alert')
        </div>
        <ul class="app-breadcrumb breadcrumb">
            {{-- <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
            @yield('breadcrumb')
        </ul>
    </div>    
  @yield('content')
  <!-- Essential javascripts for application to work-->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/alert.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="{{asset('js/plugins/pace.min.js')}}"></script>
  @yield('script')
</body>
</html>
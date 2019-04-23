<?php
use App\Category;

$categories = Category::select('id', 'name', 'parent_id')->get();
?>
<!-- Header Section -->
<header>
	<div class="container">
		<div class="top_ber">
			<div class="row">
				<div class="col-md-6">
					<div class="top_ber_left">
						20 August. Thursday 2015. 2:00 PM.
					</div>
					<!--top_ber_left-->
				</div>
				<!--col-md-6-->
				<div class="col-md-6">
					<div class="top_ber_right">
						<div class="top-menu">
							<ul class="nav navbar-nav">
								@if (Auth::guard()->check())
								<li><a href="/login">Go to page Manager</a></li>
								<li style="text-decoration: none;">
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
           								 document.getElementById('logout-form').submit();"><span>{{ __('Logout') }}</span>
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</li>
								@else
								<li><a href="/login">Login</a></li>
								<li><a href="/register">Register</a></li>
								@endif
							</ul>
						</div>
						<!--top-menu-->
					</div>
					<!--top_ber_left-->
				</div>
				<!--col-md-6-->
			</div>
			<!--row-->
		</div>
		<!--top_ber-->

		<div class="header-section">
			<div class="row">
				<div class="col-md-3">
					<div class="logo">
						<a href="/"><img class="img-responsive" src="{{asset('welcome/img/logo.png')}}" alt=""></a>
					</div>
					<!--logo-->
				</div>
				<!--col-md-3-->

				<div class="col-md-6">
					<div class="header_ad_banner">
						<!-- <a href="/"><img class="img-responsive" src="{{asset('welcome/img/img_ad.jpg')}}" alt=""></a>  -->
					</div>
				</div>
				<!--col-md-6-->

				<div class="col-md-3">
					<div class="social_icon1">
						@if (Auth::guard()->check())
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="img-profile rounded-circle" src="{{ asset('avatars/'.Auth::user()->picture) }}" style="border-radius: 50%;">
							<p class="mr-2 d-none d-lg-inline text-gray-600 small"><b>{{ Auth::user()->name }}</b></p>
						</a>
						@endif
					</div>
					<!--social_icon1-->
				</div>
				<!--col-md-3-->
			</div>
			<!--row-->
		</div>
		<!--header-section-->
	</div><!-- /.container -->

	<nav class="navbar main-menu navbar-inverse navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed pull-left" data-toggle="offcanvas">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div id="navbar" class="collapse navbar-collapse sidebar-offcanvas">
				<ul class="nav navbar-nav">
					<li class="hidden"><a href="#page-top"></a></li>
					@foreach($categories as $category_parent)
					@if ($category_parent->parent_id === 0)
					<li class="dropdown">
						<a href="/news/category/{{ $category_parent->id}}" class="dropdown-toggle" data-toggle="dropdown">{{ $category_parent->name }}<b class="caret"></b></a>
						<ul class="dropdown-menu">
							@foreach($categories as $category)
							@if ($category->parent_id === $category_parent->id)
							<li><a href="/news/category/{{ $category->id}}">{{ $category->name }}</a></li>
							@endif
							@endforeach
						</ul>
					</li>
					@endif
					@endforeach

					@if (Auth::guard()->check())
					<li class="dropdown dropdown-notifications">
						<a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
							<i data-count="0" class="glyphicon glyphicon-bell notification-icon" ></i>
						</a>
						<div class="dropdown-container">
							<div class="dropdown-toolbar">
								<div class="dropdown-toolbar-actions">
									<a href="#">Mark all as read</a>
								</div>
								<h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>
							</div>
							<ul class="dropdown-menu">
							</ul>
							<div class="dropdown-footer text-center">
								<a href="#">View All</a>
							</div>
						</div>
					</li>
					@endif
				</ul>
				<div class="pull-right">
					<form class="navbar-form" role="search" method="get" id="searchform" action="{{ route('search') }}">
						<div class="input-group">
							<input class="form-control" placeholder="Search" name="search" type="text">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</nav>
	<!-- .navbar -->

</header>
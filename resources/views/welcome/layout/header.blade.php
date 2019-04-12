
<?php
	use App\Category;
	$categories = Category::select('id','name','parent_id')->get();
 ?>
	<!-- Header Section -->
	<header>
	    <div class="container">
	     	<div class="top_ber">
				<div class="row">
		    		<div class="col-md-6">
						<div class="top_ber_left">
							20 August. Thursday 2015. 2:00 PM.
						</div><!--top_ber_left-->
		    		</div><!--col-md-6-->
		    		<div class="col-md-6">
		    			<div class="top_ber_right">
		    				<div class="top-menu">
		    					<ul class="nav navbar-nav">    
			                        <li><a href="/login">Login</a></li>
			                        <li><a href="/register">Register</a></li>
	                    		</ul>
		    				</div><!--top-menu-->
		    			</div><!--top_ber_left-->
		    		</div><!--col-md-6-->
		    	</div><!--row-->
	     	</div><!--top_ber-->
	     	
	     	<div class="header-section">
				<div class="row">
		    	 	<div class="col-md-3">
						<div class="logo">
						<a  href="/"><img class="img-responsive" src="{{asset('welcome/img/logo.png')}}" alt=""></a>
						</div><!--logo-->
		    	 	</div><!--col-md-3-->
		    	 	
		    	 	<div class="col-md-6">
						<div class="header_ad_banner">
						<a  href="/"><img class="img-responsive" src="{{asset('welcome/img/img_ad.jpg')}}" alt=""></a>
						</div>
		    	 	</div><!--col-md-6-->
		    	 	
		    	 	<div class="col-md-3">
						<div class="social_icon1">
								<a class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
								<!--Twitter-->
								<a class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
								<!--Google +-->
								<a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a>
								<!--Linkedin-->
								<a class="icons-sm li-ic"><i class="fa fa-linkedin"> </i></a> 
								<!--Pinterest-->
								<a class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a>
						</div> <!--social_icon1-->
		    	 	</div><!--col-md-3-->
		    	</div> <!--row-->	
	     	</div><!--header-section-->    	      
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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category_parent->name }}<b class="caret"></b></a>
							<ul class="dropdown-menu">
							@foreach($categories as $category)
								@if ($category->parent_id === $category_parent->id)
								<li><a href="#">{{ $category->name }}</a></li>
								@endif
							@endforeach									
							</ul>
						</li>
						@endif
					@endforeach					
				</ul>
				<div class="pull-right">
					<form class="navbar-form" role="search">
						<div class="input-group">
							<input class="form-control" placeholder="Search" name="q" type="text">
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

@extends('welcome')
@section('content')
<?php
use App\Category;

$categories = Category::where('parent_id', 0)->get();
use App\News;

$news_lastes = News::where('published', 1)
	->orderBy('created_at', 'desc')
	->limit(3)
	->get();
?>
<!-- Feature Carousel Section -->
<section id="feature_news_section" class="feature_news_section section_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="feature_news_carousel">
					<div id="featured-news-carousal" class="carousel slide" data-ride="carousel">
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">

							<div class="item active feature_news_item">
								<div class="item_wrapper">
									<div class="item_img">
										<img class="img-responsive" src="{{asset('images/'.$news_lastes->first()->picture)}}" alt="Chania">
									</div>
									<!--item_img-->
									<div class="item_title_date">
										<div class="news_item_title">
											<h2><a href="/news/{{ $news_lastes->first()->slug}}">{{$news_lastes->first()->name}}</a></h2>
										</div>
										<?php
											$user = $news_lastes->first()->user;
										?>
										<div class="item_meta"><a href="/">{{$news_lastes->first()->created_at}}</a> by:<a href="/">{{$user->name}}</a></div>
									</div>
									<!--item_title_date-->
								</div>
								<!--item_wrapper-->
								<div class="item_content">{{$news_lastes->first()->description}}</div>
							</div>
							<!--feature_news_item-->
							<!-- Left and right controls -->

						</div>
						<!--carousel-inner-->
					</div>
					<!--carousel-->
				</div>
				<!--feature_news_carousel-->
			</div>
			<!--col-md-6-->

			<div class="col-md-6">
				<div class="feature_news_static">
					<div class="row">
						@foreach($news_lastes as $key => $news_last)
						@if($key != 0)
						<?php
						$user = $news_last->user;
						?>
						<div class="col-md-6">
							<div class="feature_news_item">
								<div class="item active">
									<div class="item_wrapper">
										<div class="item_img">
											<img style="height:390px;" class="img-responsive" src="{{asset('images/'.$news_last->picture)}}" alt="Chania">
										</div>
										<!--item_img-->
										<div class="item_title_date">
											<div class="news_item_title">
												<h2><a href="/news/{{ $news_last->slug}}">{{$news_last->name}}</a></h2>
											</div>
											<div class="item_meta"><a href="#">{{$news_last->created_at}},</a> by:<a href="#">{{$user->name}}</a></div>
										</div>
										<!--item_title_date-->
									</div>
									<!--item_wrapper-->
									<div class="item_content">{{$news_last->description}}</div>
								</div>
								<!--item-->
							</div>
							<!--feature_news_item-->
						</div>
						@endif
						@endforeach
					</div>
					<!--row-->
				</div>
				<!--feature_news_static-->
			</div>
			<!--col-md-6-->
		</div>
		<!--row-->
	</div>
	<!--container-->
</section>
<!--feature_news_section-->

<!-- Feature Category Section & sidebar -->
<section id="feature_category_section" class="feature_category_section section_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				@foreach($categories as $category_parent)
				<?php
				$list_news = $category_parent->news()->limit(5)->get();
				?>
				<div class="category_layout">
					<div class="item_caregory red">
						<h2><a href="/news/category/{{ $category_parent->id}}">{{ $category_parent->name }}</a></h2>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="item feature_news_item">
								<div class="item_wrapper">
									<div class="item_img">
										<img style="with:400px; height:400px;" class="img-responsive" src="{{asset('images/'.$list_news->first()->picture)}}" alt="Chania">
									</div>
									<!--item_img-->
									<div class="item_title_date">
										<div class="news_item_title">
											<h2><a href="/news/{{ $list_news->first()->slug}}">{{ $list_news->first()->name}}</a></h2>
										</div>
										<!--news_item_title-->
										<?php
										$user = $list_news->first()->user;
										?>
										<div class="item_meta"><a href="#">{{ $list_news->first()->created_at}},</a> by:<a href="#">{{$user->name}}</a></div>
									</div>
									<!--item_title_date-->
								</div>
								<!--item_wrapper-->
								<div class="item_content">{{ $list_news->first()->description}}
								</div>
								<!--item_content-->

							</div>
							<!--feature_news_item-->
						</div>
						<!--col-md-7-->
						<div class="col-md-5">
							<div class="media_wrapper">
								@foreach($list_news as $key=> $news)
								@if($key != 0)
								<?php
								$user = $news->user;
								?>
								<div class="media">
									<div class="media-left">
										<a href="#"><img style="with:40px; height:75px;" class="media-object" src="{{asset('images/'.$news->picture)}}" alt="Generic placeholder image"></a>
									</div>
									<!--media-left-->
									<div class="media-body">
										<h3 class="media-heading"><a href="/news/{{ $news->slug}}">{{ $news->name }}</a></h3>
										<p>{{ $news->description}}</p>
										<div class="item_meta"><a href="#">{{$news->created_at}},</a> by:<a href="#">{{$user->name}}</a></div>
									</div>
									<!--media-body-->
								</div>
								<!--media-->
								@endif
								@endforeach
							</div>
							<!--media_wrapper-->
						</div>
						<!--col-md-5-->
					</div>
					<!--row-->
				</div>
				<!--category_layout-->
				@endforeach
				<div id="more_news_item" class="more_news_item">
				</div>
				<!--more_news_item-->
			</div>
			<!--col-md-9-->
			@include('welcome.layout.rightbar')
		</div>
</section>
<!--feature_category_section-->

<!-- Feature Video Item -->
<section id="feature_video_item" class="feature_video_item section_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="feature_video_wrapper">
					<div class="feature_video_title">
						<h2>Featured Videos</h2>
					</div>

					<div id="feature_video_slider" class="owl-carousel">
						<div class="item">
							<div class="video_thumb"><img src="{{asset('welcome/img/video.jpg')}}" alt="Owl Image"></div>
							<div class="video_info">
								<div class="video_item_title">
									<h3><a href="#">Track & Fiels famous still in the craze of Runner world</a></h3>
								</div>
								<!--video_item_title-->
								<div class="item_meta"><a href="#">20Aug- 2015</a></div>
								<!--item_meta-->
							</div>
							<!--video_info-->
						</div>
						<div class="item">
							<div class="video_thumb"><img src="{{asset('welcome/img/video2.jpg')}}" alt="Owl Image"></div>
							<div class="video_info">
								<div class="video_item_title">
									<h3><a href="#">Track & Fiels famous still in the craze of Runner world</a></h3>
								</div>
								<!--video_item_title-->
								<div class="item_meta"><a href="#">20Aug- 2015</a></div>
								<!--item_meta-->
							</div>
							<!--video_info-->
						</div>
						<div class="item">
							<div class="video_thumb"><img src="{{asset('welcome/img/video3.jpg')}}" alt="Owl Image"></div>
							<div class="video_info">
								<div class="video_item_title">
									<h3><a href="#">Track & Fiels famous still in the craze of Runner world</a></h3>
								</div>
								<!--video_item_title-->
								<div class="item_meta"><a href="#">20Aug- 2015</a></div>
								<!--item_meta-->
							</div>
							<!--video_info-->
						</div>
						<div class="item">
							<div class="video_thumb"><img src="{{asset('welcome/img/video2.jpg')}}" alt="Owl Image"></div>
							<div class="video_info">
								<div class="video_item_title">
									<h3><a href="#">Track & Fiels famous still in the craze of Runner world</a></h3>
								</div>
								<!--video_item_title-->
								<div class="item_meta"><a href="#">20Aug- 2015</a></div>
								<!--item_meta-->
							</div>
							<!--video_info-->
						</div>
						<div class="item">
							<div class="video_thumb"><img src="{{asset('welcome/img/video.jpg')}}" alt="Owl Image"></div>
							<div class="video_info">
								<div class="video_item_title">
									<h3><a href="#">Track & Fiels famous still in the craze of Runner world</a></h3>
								</div>
								<!--video_item_title-->
								<div class="item_meta"><a href="#">20Aug- 2015</a></div>
								<!--item_meta-->
							</div>
							<!--video_info-->
						</div>
						<div class="item">
							<div class="video_thumb"><img src="{{asset('welcome/img/video3.jpg')}}" alt="Owl Image"></div>
							<div class="video_info">
								<div class="video_item_title">
									<h3><a href="#">Track & Fiels famous still in the craze of Runner world</a></h3>
								</div>
								<!--video_item_title-->
								<div class="item_meta"><a href="#">20Aug- 2015</a></div>
								<!--item_meta-->
							</div>
							<!--video_info-->
						</div>
					</div>
					<!--feature_video_slider-->
				</div>
				<!--col-xs-12-->
			</div>
			<!--row-->
		</div>
		<!--feature_video_wrapper-->
	</div>
	<!--container-->
</section>
@endsection
@extends('welcome')
@section('content')

<?php
use App\News;
$news_lastes = News::where('published', 1)
->orderBy('created_at', 'desc')
->limit(20)
->get();
?>
<section id="feature_category_section" class="feature_category_section section_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="category_layout">
					<div class="row">
						</div>
						<!--col-md-7-->
						<div class="col-md-5">
							<div class="media_wrapper">
								@foreach($news_lastes as $news)
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
								@endforeach
							</div>
							<!--media_wrapper-->
						</div>
						<!--col-md-5-->
					</div>
					<!--row-->
				</div>
				<!--category_layout-->
				<div id="more_news_item" class="more_news_item">
				</div>
				<!--more_news_item-->
			</div>
			<!--col-md-9-->
			@include('welcome.layout.rightbar')
		</div>
</section>
<!--feature_category_section-->
@endsection
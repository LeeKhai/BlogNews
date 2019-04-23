@extends('welcome')
@section('content')
<!-- Feature Category Section & sidebar -->
<section id="feature_category_section" class="feature_category_section single-page section_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="single_content_layout">
					<div class="item feature_news_item">
						<div class="item_img">
							<img style="width:900px;height:400px;" class="img-responsive" src="{{asset('images/'.$news->first()->picture)}}" alt="Chania">
						</div>
						<!--item_img-->
						<div class="item_wrapper">
							<div class="news_item_title">
								<h2><a href="#">{{$news->first()->name}}</a></h2>
							</div>
							<!--news_item_title-->
							<div class="item_meta"><a href="#">{{ $news->first()->created_at}},</a> by:<a href="#">Jhonson</a></div>

							<span class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-full"></i>
							</span>

							<div class="single_social_icon">
								<a class="icons-sm fb-ic" href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
								<!--Twitter-->
								<a class="icons-sm tw-ic" href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
								<!--Google +-->
								<a class="icons-sm gplus-ic" href="#"><i class="fa fa-google-plus"></i><span>Google Plus</span></a>
								<!--Linkedin-->
								<a class="icons-sm li-ic" href="#"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>

							</div>
							<!--social_icon1-->

							<div class="item_content">
								{{$news->first()->content}}
							</div>
							<!--item_content-->
							<div class="category_list">
								<a href="#">Messi</a>
								<a href="#">Leonel</a>
								<a href="#">Bercelona</a>
								<a href="#">Argentina</a>
								<a href="#">Football</a>
							</div>
							<!--category_list-->
						</div>
						<!--item_wrapper-->
					</div>
					<!--feature_news_item-->

					<div class="single_related_news">
						<div class="single_media_title">
							<h2>Related News</h2>
						</div>
						<div class="media_wrapper">
							<div class="media">
								<div class="media-left">
									<a href="#"><img class="media-object" src="{{asset('welcome/img/img-list5.jpg')}}" alt="Generic placeholder image"></a>
								</div>
								<!--media-left-->
								<div class="media-body">
									<h4 class="media-heading"><a href="#">Machester United start the player
										</a></h4>
									<div class="media_meta"><a href="#">20Aug- 2015,</a> by:<a href="#">Jhonson</a></div>
									<div class="media_content">
										<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>
									</div>
									<!--media_content-->
								</div>
								<!--media-body-->
							</div>
							<!--media-->

							<div class="media">
								<div class="media-left">
									<a href="#"><img class="media-object" src="{{asset('welcome/img/img-list2.jpg')}}" alt="Generic placeholder image"></a>
								</div>
								<!--media-left-->
								<div class="media-body">
									<h4 class="media-heading"><a href="#">Machester United start the player
										</a></h4>
									<div class="media_meta"><a href="#">20Aug- 2015,</a> by:<a href="#">Jhonson</a></div>
									<div class="media_content">
										<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>
									</div>
									<!--media_content-->
								</div>
								<!--media-body-->
							</div>
							<!--media-->

							<div class="media">
								<div class="media-left">
									<a href="#"><img class="media-object" src="{{asset('welcome/img/img-list3.jpg')}}" alt="Generic placeholder image"></a>
								</div>
								<!--media-left-->
								<div class="media-body">
									<h4 class="media-heading"><a href="#">Machester United start the player
										</a></h4>
									<div class="media_meta"><a href="#">20Aug- 2015,</a> by:<a href="#">Jhonson</a></div>
									<div class="media_content">
										<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>
									</div>
									<!--media_content-->
								</div>
								<!--media-body-->
							</div>
							<!--media-->
						</div>
						<!--media_wrapper-->
					</div>
					<!--single_related_news-->


					<div class="ad">
						<img class="img-responsive" src="{{asset('welcome/img/img-single-ad.jpg')}}" alt="Chania">
					</div>

					<div class="readers_comment">
						<div class="single_media_title">
							<h2>Related Comments</h2>
						</div>
						<div class="media">
							<div class="media-left">
								<a href="#">
									<img alt="64x64" class="media-object" src="{{asset('welcome/img/img-author1.jpg')}}" data-holder-rendered="true" style="border-radius: 50%;">
								</a>
							</div>
							<div class="media-body">
								<h2 class="media-heading">Sr. Ryan</h2>
								But who has any right to find fault with a man who chooses to enjoy a pleasure that has
								no annoying consequences, or one who avoids a pain that produces no resultant pleasure?


								<div class="comment_article_social">
									<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
									<a href="#"><span class="reply_ic">Reply </span></a>
								</div>
								<div class="media reply">
									<div class="media-left">
										<a href="#">
											<img alt="64x64" class="media-object" data-src="{{asset('welcome/img/img-author2.jpg')}}" src="{{asset('welcome/img/img-author2.jpg')}}" style="border-radius: 50%;" data-holder-rendered="true">
										</a>
									</div>
									<div class="media-body">
										<h2 class="media-heading">Admin</h2>
										But who has any right to find fault with a man who chooses to enjoy a pleasure
										that has no annoying consequences, or one who avoids a pain that produces no
										resultant pleasure?

										<div class="comment_article_social">
											<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
											<a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
											<a href="#"><span class="reply_ic"> Reply </span></a>
										</div>
									</div>
								</div>
							</div>

						</div>

						<div id="appendHTML">
							@foreach($comments as $commentParent)
							<?php
							$user = $commentParent->user;
							?>
							@if($commentParent->parent_id == 0)
							<div class="media">
								<div class="media-left">
									<a href="#">
										<img alt="64x64" class="media-object" src="{{ asset('avatars/'.$user->picture) }}" data-holder-rendered="true" style="border-radius: 50%;">
									</a>
								</div>
								<div class="media-body">
									<h2 class="media-heading">{{$user->name}}</h2>
									{{$commentParent->content}}
									<div class="comment_article_social">
										<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
										<a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
										<a href="#"><span class="reply_ic"> Reply </span></a>
									</div>
									@foreach($comments as $comment)
									@if($comment->parent_id == $commentParent->id)
									<?php
									$user = $comment->user;
									?>
									<div class="media reply">
										<div class="media-left">
											<a href="#">
												<img alt="64x64" class="media-object" src="{{ asset('avatars/'.$user->picture) }}" style="border-radius: 50%;" data-holder-rendered="true">
											</a>
										</div>
										<div class="media-body">
											<h2 class="media-heading">{{$user->name}}</h2>
											{{$comment->content}}
											<div class="comment_article_social">
												<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
												<a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
												<a href="#"><span class="reply_ic"> Reply </span></a>
											</div>
										</div>
									</div>
									@endif
									@endforeach
								</div>
							</div>
							@endif
							@endforeach
						</div>


					</div>
					<!--readers_comment-->

					<div class="add_a_comment">
						<div class="single_media_title">
							<h2>Add a Comment</h2>
						</div>
						<div class="comment_form">
							@if (Auth::guard()->check())
							<!-- <form method="post" id="commentsform" action="{{ route('comment', $news->first()->id )}}">
								@csrf -->
							<div class="form-group comment">
								<textarea class="form-control" id="inputComment" placeholder="Comment" name="content"></textarea>
							</div>
							<input type="hidden" id="news_id" value="{{$news->first()->id}}">
							<button class="btn btn-submit red" id="buttonSubmit">Submit</button>
							<!-- </form> -->

							@else
							<a href="/login">
								<h3 style="text-decoration: none; margin-left:280px;">Login to Comment</h3>
							</a>
							@endif
						</div>
						<!--comment_form-->
					</div>
					<!--add_a_comment-->
				</div>
				<!--single_content_layout-->
			</div>
			@include('welcome.layout.rightbar')
		</div>
</section>
<!--feature_category_section-->
@endsection
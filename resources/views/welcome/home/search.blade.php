@extends('welcome')
@section('content')

<!-- Feature Category Section & sidebar -->
<section id="feature_category_section" class="feature_category_section category_page section_wrapper">
    <div class="container">
        <div>
            <h3>Kết quả tìm kiếm >> {{$search}}</h3>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                </div>
                <div class="row">
                    @forelse($list_news as $news)
                    <div class="col-md-6">
                        <div class="feature_news_item">
                            <div class="item">
                                <div class="item_wrapper">
                                    <div class="item_img">
                                        <img class="img-responsive" src="{{asset('images/'.$news->picture)}}" alt="Chania">
                                    </div>
                                    <!--item_img-->
                                    <div class="item_title_date">
                                        <div class="news_item_title">
                                            <h2><a href="/news/{{$news->slug}}">{!! str_replace($search, '<b style="background-color:yellow">'.$search.'</b>', $news->name) !!}</a></h2>
                                        </div>
                                        <?php
                                        $user = $news->user;
                                        ?>
                                        <div class="item_meta"><a href="#">{{$news->created_at}},</a> by:<a href="#">{{$user->name}}</a></div>
                                    </div>
                                    <!--item_title_date-->
                                </div>
                                <!--item_wrapper-->
                                <div class="item_content">{{$news->description}}.</div>
                            </div>
                            <!--item-->
                        </div>
                        <!--feature_news_item-->
                    </div>
                    <!--col-md-6-->
                    @empty
                         <h3>Không tìm thấy bài viết !!!</h3>
                    @endforelse
                </div>
                <!--row-->
            </div>
            <!--col-md-9-->
            @include('welcome.layout.rightbar')
        </div>
</section>
<!--feature_category_section-->
@endsection
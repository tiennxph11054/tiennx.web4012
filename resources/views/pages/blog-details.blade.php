@extends('frontend.frontend-master')
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{url('/')}}">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Tin tức</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--blog area start-->
<div class="main_blog_area blog_details">
    <div class="row">
        @foreach($posts as $p)
        <div class="col-lg-9 col-md-12">
            <div class="blog_details_left">
                <div class="blog_gallery">
                    <div class="blog_header">
                        <!-- <span>
                            <a href="#">WordPress</a>
                        </span> -->
                        <h2><a href="#">{{$p->name}}</a></h2>
                        <div class="blog__post">
                            <ul>
                                <!-- <li class="post_author">Posts by : admin</li> -->
                                <li class="post_date"> {{$p->created_at}} </li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog_active owl-carousel">
                        <div class="blog_thumb blog__hover">
                            <a href=""><img src="{{asset('upload/product/' . $p->image)}}" alt=""></a>
                        </div>
                        <!-- <div class="blog_thumb">
                            <a href="blog-details.html"><img src="assets\img\blog\blog7.jpg" alt=""></a>
                        </div>
                        <div class="blog_thumb">
                            <a href="blog-details.html"><img src="assets\img\blog\blog8.jpg" alt=""></a>
                        </div>
                        <div class="blog_thumb">
                            <a href="blog-details.html"><img src="assets\img\blog\blog7.jpg" alt=""></a>
                        </div> -->
                    </div>

                    <div class="blog_entry_content">
                        <p class="blockquote">{{$p->description}}</p>

                        <p>{!!$p->content!!}</p>
                    </div>
                    <!-- <div class="blog_entry_meta">
                        <ul>
                            <li><a href="#">0 comments</a></li>
                            <li> / Tags: <a href="#">fashion</a></li>
                        </ul>
                    </div> -->
                    <div class="wishlist-share">
                        <h4>Share on:</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--services img area-->

                <!--services img end-->
                <!-- <div class="blog__page_content">
                    <p>Suspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim vitae lorem non mollis. Praesent pretium tellus in tortor viverra condimentum. Nullam dignissim facilisis nisl, accumsan placerat justo ultricies vel. Vivamus finibus mi a neque pretium, ut convallis dui lacinia. Morbi a rutrum velit. Curabitur sagittis quam quis consectetur mattis. Aenean sit amet quam vel turpis interdum sagittis et eget neque. Nunc ante quam, luctus et neque a, interdum iaculis metus. Aliquam vel ante mattis, placerat orci id, vehicula quam. Suspendisse quis eros cursus, viverra urna sed, commodo mauris. Cras diam arcu, fringilla a sem condimentum, viverra facilisis nunc. Curabitur vitae orci id nulla maximus maximus. Nunc pulvinar sollicitudin molestie.</p>
                </div> -->
                <div class="comments_area">
                    <div class="comments__title">
                        <h3>Leave a Reply </h3>
                    </div>
                    <div class="comments__notes">
                        <p>Your email address will not be published.</p>
                    </div>
                    <div class="product_review_form blog_form">
                        <form action="#">
                            <div class="row">
                                <div class="col-12">
                                    <label for="review_comment">comment </label>
                                    <textarea name="comment" id="review_comment"></textarea>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label for="author">Name</label>
                                    <input id="author" type="text">

                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label for="email">Email </label>
                                    <input id="email" type="text">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label for="website">website </label>
                                    <input id="website" type="text">
                                </div>
                            </div>
                            <button type="submit">Post Comment</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
        @endforeach
        <div class="col-lg-3 col-md-8 offset-md-2 offset-lg-0">
            <div class="blog_details_right">
                <div class="blog_widget search_widget mb-30">
                    <h3>Search</h3>
                    <form action="#">
                        <input placeholder="search.." type="text">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="blog_widget recent-posts mb-30">
                    <h3>Latest Tweets</h3>
                    <div class="single_posts mb-20">
                        <div class="posts_thumb">
                            <a href="#"><img src="assets\img\blog\tweets.jpeg" alt=""></a>
                        </div>
                        <div class="post_content ">
                            <span>
                                <a class="tweet_name" href="#">Kevin Sobo</a>
                                <a class="tweet_author" href="#">@roadthemes</a>
                            </span>
                            <a href="#"> Sep 23 reply retweet 2 years ago </a>
                        </div>
                    </div>
                    <div class="single_posts mb-20">
                        <div class="posts_thumb">
                            <a href="#"><img src="assets\img\blog\tweets.jpeg" alt=""></a>
                        </div>
                        <div class="post_content ">
                            <span>
                                <a class="tweet_name" href="#">Kevin Sobo</a>
                                <a class="tweet_author" href="#">@roadthemes</a>
                            </span>
                            <a href="#"> Sep 23 reply retweet 2 years ago </a>
                        </div>
                    </div>
                    <div class="single_posts mb-20">
                        <div class="posts_thumb">
                            <a href="#"><img src="assets\img\blog\tweets.jpeg" alt=""></a>
                        </div>
                        <div class="post_content ">
                            <span>
                                <a class="tweet_name" href="#">Kevin Sobo</a>
                                <a class="tweet_author" href="#">@roadthemes</a>
                            </span>
                            <a href="#"> Sep 23 reply retweet 2 years ago </a>
                        </div>
                    </div>
                    <div class="post_button">
                        <a href="#"><i class="fa fa-twitter"></i> Follow @roadthemes</a>
                    </div>
                </div>
                <div class="blog_widget widget_categoie  mb-30">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">fashion</a></li>
                        <li><a href="#">image</a></li>
                        <li><a href="#">travel</a></li>
                        <li><a href="#">bideos</a></li>
                        <li><a href="#">WordPress</a></li>
                    </ul>
                </div>
                <div class="blog_widget widget_categoie mb-30">
                    <h3>Archives</h3>
                    <ul>
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">fashion</a></li>
                        <li><a href="#">image</a></li>
                        <li><a href="#">travel</a></li>
                        <li><a href="#">bideos</a></li>
                        <li><a href="#">WordPress</a></li>
                    </ul>
                </div>
                <div class="blog_widget widget_recent  mb-30">
                    <h3>Recent Posts</h3>
                    <div class="widget_recent_inner">
                        <div class="single_posts">
                            <div class="posts_thumb">
                                <a href="#"><img src="assets\img\blog\blog11.jpg" alt=""></a>
                            </div>
                            <div class="post_content">
                                <span>
                                    <a class="tweet_author" href="#">blog1 Blog image post </a>

                                </span>
                                <a href="#"> March 10, 2018 </a>
                            </div>
                        </div>
                        <div class="single_posts">
                            <div class="posts_thumb">
                                <a href="#"><img src="assets\img\blog\blog13.jpg" alt=""></a>
                            </div>
                            <div class="post_content">
                                <span>
                                    <a class="tweet_author" href="#">blog1 Blog image post </a>

                                </span>
                                <a href="#"> March 10, 2018 </a>
                            </div>
                        </div>
                        <div class="single_posts">
                            <div class="posts_thumb">
                                <a href="#"><img src="assets\img\blog\blog14.jpg" alt=""></a>
                            </div>
                            <div class="post_content">
                                <span>
                                    <a class="tweet_author" href="#">blog1 Blog image post </a>

                                </span>
                                <a href="#"> March 10, 2018 </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog_widget widget_recent  mb-30">
                    <h3>Popular</h3>
                    <div class="widget_recent_inner">
                        <div class="single_posts">
                            <div class="posts_thumb">
                                <a href="#"><img src="assets\img\blog\blog11.jpg" alt=""></a>
                            </div>
                            <div class="post_content">
                                <span>
                                    <a class="tweet_author" href="#">blog1 Blog image post </a>

                                </span>
                                <a href="#"> March 10, 2018 </a>
                            </div>
                        </div>
                        <div class="single_posts">
                            <div class="posts_thumb">
                                <a href="#"><img src="assets\img\blog\blog13.jpg" alt=""></a>
                            </div>
                            <div class="post_content">
                                <span>
                                    <a class="tweet_author" href="#">blog1 Blog image post </a>

                                </span>
                                <a href="#"> March 10, 2018 </a>
                            </div>
                        </div>
                        <div class="single_posts">
                            <div class="posts_thumb">
                                <a href="#"><img src="assets\img\blog\blog14.jpg" alt=""></a>
                            </div>
                            <div class="post_content">
                                <span>
                                    <a class="tweet_author" href="#">blog1 Blog image post </a>

                                </span>
                                <a href="#"> March 10, 2018 </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog_widget widget_recent  mb-30">
                    <h3>Comments</h3>
                    <div class="widget_recent_inner">
                        <div class="single_posts">
                            <div class="posts_thumb">
                                <a href="#"><img src="assets\img\blog\blog12.jpg" alt=""></a>
                            </div>
                            <div class="post_content">
                                <span>
                                    <a class="tweet_author" href="#">blog1 Blog image post </a>

                                </span>
                                <a href="#"> March 10, 2018 </a>
                            </div>
                        </div>
                        <div class="single_posts">
                            <div class="posts_thumb">
                                <a href="#"><img src="assets\img\blog\blog12.jpg" alt=""></a>
                            </div>
                            <div class="post_content">
                                <span>
                                    <a class="tweet_author" href="#">blog1 Blog image post </a>

                                </span>
                                <a href="#"> March 10, 2018 </a>
                            </div>
                        </div>
                        <div class="single_posts">
                            <div class="posts_thumb">
                                <a href="#"><img src="assets\img\blog\blog12.jpg" alt=""></a>
                            </div>
                            <div class="post_content">
                                <span>
                                    <a class="tweet_author" href="#">blog1 Blog image post </a>

                                </span>
                                <a href="#"> March 10, 2018 </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
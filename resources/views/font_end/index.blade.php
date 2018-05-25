@extends('layouts.header')
@section('css')
<style type="text/css" media="screen">
.figure>img{
	max-height: 417px;
}
	
</style>
@endsection

@section('content')
<div class="content offset-top-0" id="slider">
			<!--
				#################################
				- THEMEPUNCH BANNER -
				#################################
				--> 
			<!-- START REVOLUTION SLIDER 3.1 rev5 fullwidth mode -->
			<h2 class="hidden">Slider Section</h2>
			<div class="tp-banner-container">
				<div class="tp-banner">
					<ul>
							
						<!-- SLIDE -1 -->
						<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
							<!-- MAIN IMAGE --> 
							<img src="https://zent.edu.vn/images/slides/1.jpg"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" > 
							<!-- LAYERS --> 
							<!-- TEXT -->
							<div class="tp-caption lfl stb" 
								data-x="205"              
								data-y="center"    
								data-voffset="60" 
								data-speed="600" 
								data-start="900" 
								data-easing="Power4.easeOut" 
								data-endeasing="Power4.easeIn" 
								style="z-index: 2;">
								<a href="listing.html" class="link-button button--border-thick" data-text="Shop now!">Enjoy now!</a>
							</div>
						</li>
						<!-- /SLIDE -1 -->
						<!-- SLIDE 2  -->            
						<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
							<!-- MAIN IMAGE --> 
							<img src="https://zent.edu.vn/images/slides/core_values.jpg"  alt="slide2"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
							<!-- LAYERS -->
							<!-- TEXT -->
							<div class="tp-caption lfr stb" 
								data-x="right"              
								data-y="center"    
								data-voffset="-5"
								data-hoffset="-205" 
								data-speed="600" 
								data-start="900" 
								data-easing="Power4.easeOut" 
								data-endeasing="Power4.easeIn" 
								style="z-index: 2;">
								<a href="listing.html" class="link-button button--border-thick pull-right" data-text="Shop now!">Enjoy now!</a>
							</div>							
						</li>
						<!-- /SLIDE 2  -->						
						<!-- SLIDE - 3 -->
						<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
										<img src="https://zent.edu.vn/images/slides/1.jpg"  alt="slide3"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
									<!-- LAYER NR. 1 -->
									<div class="tp-caption tp-fade fadeout fullscreenvideo"
										data-x="0"
										data-y="0"
										data-speed="1000"
										data-start="1100"
										data-easing="Power4.easeOut"
										data-endspeed="1500"
										data-endeasing="Power4.easeIn"
										data-autoplay="true"
										data-autoplayonlyfirsttime="false"
										data-nextslideatend="true"
										data-forceCover="1"
										data-dottedoverlay="twoxtwo"
										data-aspectratio="16:9"
										data-forcerewind="on"
										style="z-index: 2">


										<video class="video-js vjs-default-skin" preload="none" 
											poster='images/slides/video/video_img.jpg' data-setup="{}">
											<source src='images/slides/video/explore.mp4' type='video/mp4' />
											<source src='images/slides/video/explore.webm' type='video/webm' />
											<source src='images/slides/video/explore.ogv' type='video/ogg'  />
										</video>

									</div>
									<!-- TEXT -->
								<div class="tp-caption lfb stb" 
								data-x="center"              
								data-y="center"    
								data-voffset="0"
								data-hoffset="0" 
								data-speed="600" 
								data-start="900" 
								data-easing="Power4.easeOut" 
								data-endeasing="Power4.easeIn" 
								style="z-index: 2;">
								<div class="tp-caption3--wd-1 color-white">Spring -Summer 2016</div>
								<div class="tp-caption3--wd-2">Season sale!</div>
								<div class="tp-caption3--wd-3 color-white">Get huge</div>
								<div class="tp-caption3--wd-3 color-white">savings!</div>
								<div class="text-center"><a href="listing.html" class="link-button button--border-thick" data-text="Shop now!">Shop now!</a></div>
							</div>	
						
						</li>
						<!-- /SLIDE - 3 -->	
								  		
						
						
					</ul>
				</div>
			</div>
		</div>



			{{-- ################################################
				 ## 										   ##
				 ## 	Content About Cours!!!!!!!!!!!!!!!!	   ##
			 	 ## 										   ##
				 ################################################ --}}
	<div style="padding: 0 20px;">
	
		<div class="carousel-products row" id="postsCarousel" style="margin-top: 30px;">
								<!-- slide-->
								@foreach ($products as $product)
									{{-- expr --}}
								<div class="col-sm-3 col-xl-6">
									<!--  -->
									<div class="recent-post-box">
										<div class="col-lg-12 col-xl-6">
											<a href="{{ asset('posts') }}/{{$product['slug']}}">
												<span class="figure">
													<img src="{{$product['image']}}" alt="">
													<span class="figcaption label-top-left">
														<span>
															<b style="font-size: 15px">{{$product['updated_at']->diffForHumans()}}</b>
														</span>
													</span>
												</span>
											</a>
										</div>
										<div class="col-lg-12 col-xl-6">
											<div class="recent-post-box__text">
												<h4><a href="{{ asset('posts') }}/{{$product['slug']}}">{{$product['name']}}</a></h4>
												<div class="author">by <b>Admin</b></div>
												<p>{{$product['description']}}</p>
												<a class="link-commet" href="{{ asset('posts') }}/{{$product['slug']}}"><span class="icon icon-message "></span><span class="number">0</span> comment(s)</a>
											</div>
										</div>
									</div>
									<!-- / -->
								</div>
								@endforeach
		</div>

	</div>

			{{-- ################################################
				 ## 										   ##
				 ## 	slide about people					   ##
			 	 ## 										   ##
				 ################################################ --}}


<div class="content content-bg-1 fixed-bg">
				<div class="container">				
					<div class="row">
						<h2 class="text-center text-uppercase title-under">Giá Trị CỐt Lõi</h2>
						<div class="slider-blog slick-arrow-bottom">
							<!-- slide-->
							<a href="blog-post-right-column.html" class="link-hover-block">
								<div class="slider-blog__item">
									<div class="row">
										<div class="col-xs-12 col-sm-2 col-sm-offset-3 box-foto">
											<img src="https://scontent.fhan3-2.fna.fbcdn.net/v/t1.0-9/17523138_1955391924692783_5412547279780037225_n.jpg?_nc_cat=0&oh=c4eecd9ab682c55d2a4a456e38b5a649&oe=5B844264" width="200px" height="100px" alt="">
										</div>
										<div class="col-xs-12 col-sm-5 col-xl-4 box-data">
											<h6>Vũ Hiển  <em>&nbsp;-&nbsp;  GV : Font_end</em></h6>
											<p>
												Đừng so sánh mình với bất cứ ai trong thế giới này. Nếu bạn làm như vậy có nghĩa bạn đang sỉ nhục chính bản thân mình.
											</p>
										</div>
									</div>
								</div>
							</a>
							<!-- /slide-->
							<!-- slide-->
							<a href="blog-post-right-column.html" class="link-hover-block">
								<div class="slider-blog__item">
									<div class="row">
										<div class="col-xs-12 col-sm-2 col-sm-offset-3 box-foto">
											<img src="https://scontent.fhan3-2.fna.fbcdn.net/v/t1.0-9/21766585_131049410970858_4518975249382899413_n.jpg?_nc_cat=0&oh=e29a36a7634425804e987db00029ef72&oe=5B8F6045" width="200px" height="100px" alt="">
										</div>
										<div class="col-xs-12 col-sm-5 box-data">
											<h6>Vũ Thắng  <em>&nbsp;-&nbsp;  GV : Laravel</em></h6>
											<p>
												Sống thì đừng quan tâm người khác nói gì về mình, bởi chỉ có bạn mới biết mình là ai.
											</p>
										</div>
									</div>
								</div>
							</a>
							<!-- /slide-->
							<!-- slide-->
							<a href="blog-post-right-column.html" class="link-hover-block">
								<div class="slider-blog__item">
									<div class="row">
										<div class="col-xs-12 col-sm-2 col-sm-offset-3 box-foto">
											<img src="https://scontent.fhan3-2.fna.fbcdn.net/v/t31.0-8/11169601_424817367700969_6921761755563164159_o.jpg?_nc_cat=0&oh=933ce72f0d5811999900f756e8cee217&oe=5B9D2CFF" width="200px" height="100px" alt="">
										</div>
										<div class="col-xs-12 col-sm-5 box-data">
											<h6>Tú Tồ   <em>&nbsp;-&nbsp;  GV : PHP</em></h6>
											<p>
												Bạn sinh ra là một nguyên bản. Đừng chết đi như một bản sao
											</p>
										</div>
									</div>
								</div>
							</a>
							<a href="blog-post-right-column.html" class="link-hover-block">
								<div class="slider-blog__item">
									<div class="row">
										<div class="col-xs-12 col-sm-2 col-sm-offset-3 box-foto">
											<img src="https://scontent.fhan3-2.fna.fbcdn.net/v/t1.0-0/p206x206/14233269_649241845243501_1952994916726556516_n.jpg?_nc_cat=0&oh=f2d35d5f83193c3d7c25fe90b7ee4c90&oe=5B50DAC9" width="200px" height="100px" alt="">
										</div>
										<div class="col-xs-12 col-sm-5 box-data">
											<h6>Nguyễn Minh   <em>&nbsp;-&nbsp;  GV : Javacore</em></h6>
											<p>
												Sự lười biếng của bản thân như một cái rễ cây. Chúng nhanh chóng phát triển và ghìm chặt bạn tại một chỗ.
											</p>
										</div>
									</div>
								</div>
							</a>
							<!-- /slide-->
						</div>
					</div>
				</div>
			</div>


			{{-- ################################################
				 ## 										   ##
				 ## 	slide about Logo					   ##
			 	 ## 										   ##
				 ################################################ --}}



<div class="content section-indent-bottom">
				<div class="container">
					<div class="row">
						<div class="brands-carousel">
							<div><a href="#"><img src="images/custom/brand-01.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-02.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-03.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-04.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-05.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-06.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-07.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-08.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-09.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-10.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-01.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-02.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-03.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-04.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-05.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-06.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-07.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-08.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-09.png" alt=""></a></div>
							<div><a href="#"><img src="images/custom/brand-10.png" alt=""></a></div>
						</div>
					</div>
				</div>
			</div>




@endsection
@section('js')
<script src="{{ asset('js') }}/custom.js"></script>	
<script src="{{ asset('js') }}/js-index-01.js"></script>
@endsection
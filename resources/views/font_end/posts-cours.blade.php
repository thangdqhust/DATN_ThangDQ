@extends('layouts.header')
@section('css')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<style type="text/css" media="screen">
#smallGallery>li{
	display: inline-block;

}
#smallGallery>li>a>img{
	height:  160px;
	width:  124px
}
</style>	
@endsection
@section('content')
<!-- End HEADER section -->
<!-- breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb--ys pull-left">
			<li class="home-link"><a href="index.html" class="icon icon-home"></a></li>
			<li><a href="#">Women’s</a></li>
			<li class="active">Dresses</li>
		</ol>
	</div>
</div>
<!-- /breadcrumbs --> 
<!-- CONTENT section -->
<div id="pageContent">
	<input type="hidden" name="code" id="codeProduct" value="{{$products['code']}}">
	<section class="content offset-top-0">
		<div class="container">
			<div class="row product-info-outer">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 hidden-xs">
							<div class="product-main-image">
								<div class="product-main-image__item">
									<img class="product-zoom" id="anhSP" anhSP="{{$img[0]}}" src="{{$img[0]}}" alt="" />
								</div>
								<div class="product-main-image__zoom"></div>
							</div>
							<div class="product-images-carousel">
								<ul id="smallGallery">
									@foreach ($img as $element)
									<li><a href="#" data-image="{{$element}}" data-zoom-image="{{$element}}"><img src="{{$element}}" alt="" /></a></li>
									@endforeach
									
								</ul>
							</div>
							<a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="video-link"><span class="icon icon-videocam"></span>Video</a>
						</div>
						<div class="product-info col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<div class="wrapper hidden-xs">
								<div class="product-info__sku pull-left">CODE: <strong>{{$products['code']}}</strong></div>
								<div class="product-info__availability pull-right">Availability:   <strong class="color">In Stock</strong></div>
							</div>
							<div class="product-info__title">
								<h2>{{$products['name']}}</h2>
							</div>
							<div class="wrapper visible-xs">
								<div class="product-info__sku pull-left">SKU: <strong>mtk012c</strong></div>
								<div class="product-info__availability pull-right">Availability:   <strong class="color">In Stock</strong></div>
							</div>
							<div class="visible-xs">
								<div class="clearfix"></div>
								<ul id="mobileGallery">
									@foreach ($img as $element)
									<li><a href="#" data-image="{{$element}}" data-zoom-image="{{$element}}"><img src="{{$element}}" alt="" /></a></li>
									@endforeach
								</ul>
							</div>
							<div class="price-box product-info__price"><span class="price-box__new">${{number_format($products['sale_cost'])}}</span> <span class="price-box__old">${{number_format($products['origin_cost'])}}</span></div>
							<div class="product-info__review">
								<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
								<a href="#">1 Review(s)</a> <a href="#">Add Your Review</a> 
							</div>
							<div class="divider divider--xs product-info__divider hidden-xs"></div>
							<div class="product-info__description hidden-xs">
								<div class="product-info__description__brand"><img src="{{ asset('') }}images/custom/brand.png"  alt="" /> </div>
								<div class="product-info__description__text">{{$products['description']}}</div>
							</div>
							<div class="divider divider--xs product-info__divider"></div>
							<div class="wrapper">
								<div class="pull-left"><span class="option-label">COLOR:</span>
									<br><br>
									<button type="button"   id="colorForProduct" style="border: 0px;background-color: #f5f5f5;line-height: 40px;width: 160px;text-align: center;border:1px solid black">Click For Choses Color</button>
									<input type="hidden" id="setColor">
								</div>
								<div class="pull-right required">* Required Fields</div>
							</div>
							<div class="wrapper">
								<div class="pull-left"><span class="option-label">SIZE:</span></div>
								<div class="pull-left required">*</div>
							</div>
							<br><br>
							<button type="button" id="sizeForProduct" style="border: 0px;background-color: #f5f5f5;line-height: 40px;width: 160px;text-align: center;border:1px solid black">Click For Choses Size</button>
							<input type="hidden" id="setSize">
							
							<div class="divider divider--sm"></div>
							<div class="wrapper">
								<div class="pull-left"><span class="qty-label">QTY:</span></div>
								<div class="pull-left">											
									<!--  -->
									<div class="number input-counter">
										<span class="minus-btn"></span>
										<input type="text" id="quantity" value="1" size="5"/>
										<span class="plus-btn"></span>
									</div>
									<!-- / -->
								</div>
								<div class="pull-left"><button type="button" id="addTocart" class="btn btn--ys btn--xxl"><span class="icon icon-shopping_basket"></span> Add to cart</button></div>
							</div>
							<ul class="product-link">
								<li class="text-right"><a href="#"><span class="icon icon-favorite_border  tooltip-link"></span><span class="text">Add to wishlist</span></a></li>
								<li class="text-left"><a href="#"><span class="icon icon-sort  tooltip-link"></span><span class="text">Add to compare</span></a></li>
							</ul>									
						</div>	
					</div>
					<div class="content">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-tabs--ys1" role="tablist">
							<li class="active"><a href="#Tab1"  role="tab" data-toggle="tab" class="text-uppercase">DESCRIPTION</a></li>
							<li><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase">Reviews</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content tab-content--ys nav-stacked">
							<div role="tabpanel" class="tab-pane active" id="Tab1">
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
								<div class="divider divider--md"></div>
								<table class="table table-params">
									<tbody>
										<tr>
											<td class="text-right"><span class="color">PROOF</span></td>
											<td>PDF Proof</td>
										</tr>
										<tr>
											<td class="text-right"><span class="color">SAMPLES</span></td>
											<td>Digital, Printed</td>
										</tr>
										<tr>
											<td class="text-right"><span class="color">WRAPPING</span></td>
											<td>Yes,  No</td>
										</tr>
										<tr>
											<td class="text-right"><span class="color">UV GLOSS COATING</span></td>
											<td>Yes</td>
										</tr>
										<tr>
											<td class="text-right"><span class="color">SHRINK WRAPPING</span></td>
											<td>No Shrink Wrapping, Shrink in 25s, Shrink in 50s, Shrink in 100s</td>
										</tr>
										<tr>
											<td class="text-right"><span class="color">WEIGHT</span></td>
											<td>0.05, 0.06, 0.07ess cards</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div role="tabpanel" class="tab-pane" id="Tab2">
								<h5><strong class="color">CUSTOMER REVIEWS 1 ITEM(S)</strong></h5>
								<p> GREAT!</p>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
								<div class="divider divider--xs"></div>
								<table class="table table-params">
									<tbody>
										<tr>
											<td class="text-right"><span class="color">QUALITY</span></td>
											<td>
												<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
											</td>
										</tr>
										<tr>
											<td class="text-right"><span class="color">PRICE</span></td>
											<td>
												<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
											</td>
										</tr>
										<tr>
											<td class="text-right"><span class="color">VALUE</span></td>
											<td>
												<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
											</td>
										</tr>
									</tbody>
								</table>
								<p class="color-light">Review by User / (posted on 16/9/2016)</p>
								<div class="divider divider--xs"></div>
								<h5><strong class="color">WRITE YOUR OWN REVIEW</strong></h5>
								<p><span class="color">YOU'RE REVIEWING:</span>  Lorem ipsum dolor sit amet conse ctetur</p>
								<p><span class="color">HOW DO YOU RATE THIS PRODUCT?</span></p>
								<div class="divider divider--xs"></div>
								<div class="table-responsive">
									<table class="table table-params">
										<tbody>
											<tr>
												<td class="text-right"></td>
												<td class="text-center">
													<div class="rating"><span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span></div>
												</td>
												<td class="text-center">
													<div class="rating"><span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span></div>
												</td>
												<td class="text-center">
													<div class="rating"><span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span></div>
												</td>
												<td class="text-center">
													<div class="rating"><span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span></div>
												</td>
												<td class="text-center">
													<div class="rating"><span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span></div>
												</td>
											</tr>
											<tr>
												<td class="text-right"><span class="color">QUALITY</span></td>
												<td class="text-center"><span class="icon-enable">&#x25cf;</span></td>
												<td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
												<td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
												<td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
												<td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
											</tr>
											<tr>
												<td class="text-right"><span class="color">PRICE</span></td>
												<td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
												<td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
												<td class="text-center"><span class="icon-enable">&#x25cf;</span></td>
												<td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
												<td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
											</tr>
											<tr>
												<td class="text-right"><span class="color">VALUE</span></td>
												<td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
												<td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
												<td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
												<td class="text-center"><span class="icon-enable">&#x25cf;</span></td>
												<td class="text-center"><span class="icon-disable">&#x25cf;</span></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="divider divider--xs"></div>
								<form action="#" class="contact-form">
									<label>Nickname<span class="required">*</span></label>
									<input type="text" class="input--ys input--ys--full">
									<label>Summary of Your Review<span class="required">*</span></label>
									<input type="text" class="input--ys input--ys--full">
									<label>Review<span class="required">*</span></label>
									<textarea class="textarea--ys input--ys--full"></textarea>
									<div class="divider divider--xs"></div>
									<button type="submit" class="btn btn--ys text-uppercase">Submit Review</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>			
		<!-- related products -->
		<section class="content">
			<div class="container">
				<!-- title -->
				<div class="title-with-button">
					<div class="carousel-products__center pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
					<h2 class="text-left text-uppercase title-under pull-left">YOU MAY ALSO BE INTERESTED IN THE FOLLOWING PRODUCT(S)</h2>
				</div>
				<!-- /title --> 
				<!-- carousel -->
				<div class="carousel-products row" id="carouselRelated">
					@foreach ($notics as $element)
					

					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xl-one-six" style="margin: 0 0 60px 0">
						<!-- product -->
						<div class="product">
							<div class="product__inside">
								<!-- product image -->
								<div class="product__inside__image">
									<a href="{{ asset('posts') }}/{{$element['slug']}}"> <img style="width: 263px;height: 263px" src="{{$element['image']}}" alt=""> </a> 
									<!-- quick-view --> 
									<a href="{{ asset('posts') }}/{{$element['slug']}}" data-toggle="modal" data-target="#quickViewModal" class="quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a>  
									<!-- /quick-view --> 
								</div>
								<!-- /product image --> 
								<!-- product name -->
								<div class="product__inside__name">
									<h2><a href="{{ asset('posts') }}/{{$element['slug']}}">Mauris lacinia lectus</a></h2>
								</div>
								<!-- /product name -->                 <!-- product description --> 
								<!-- visible only in row-view mode -->
								<div class="product__inside__description row-mode-visible"> Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </div>
								<!-- /product description -->                 <!-- product price -->
								<div class="product__inside__price price-box">$73.00</div>
								<!-- /product price -->                 <!-- product review --> 
								<!-- visible only in row-view mode -->
								<div class="product__inside__review row-mode-visible">
									<div class="rating row-mode-visible"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
									<a href="#">1 Review(s)</a> <a href="#">Add Your Review</a> 
								</div>
								<!-- /product review --> 
								<div class="product__inside__hover">
									<!-- product info -->
									<div class="product__inside__info">
										<div class="product__inside__info__btns"> <a href="#" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
											<a href="#" data-toggle="modal" data-target="#quickViewModal" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> 
										</div>
										<ul class="product__inside__info__link hidden-xs">
											<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
											<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
										</ul>
									</div>
									<!-- /product info --> <!-- product rating -->
									<div class="rating row-mode-hide"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
									<!-- /product rating --> 
								</div>
							</div>
						</div>
						<!-- /product --> 
					</div>
					@endforeach
				</div>
				<!-- /carousel --> 
			</div>
		</section>
		<!-- /related products -->
	</div>
	<!-- End CONTENT section --> 
	@endsection
	@section('js')
	<!-- Latest compiled JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
	{{-- <script src="external/jquery/jquery-2.1.4.min.js"></script>  --}}
	<!-- Bootstrap 3--> 
	<script src="external/bootstrap/bootstrap.min.js"></script> 
	<!-- Specific Page External Plugins --> 
	<script src="{{ asset('js') }}/slick.min.js"></script>
	<script src="{{ asset('js') }}/bootstrap-select.min.js"></script>  
	<script src="{{ asset('js') }}/jquery.plugin.min.js"></script> 
	<script src="{{ asset('js') }}/jquery.countdown.min.js"></script>  		
	<script src="{{ asset('js') }}/instafeed.min.js"></script>  	
	<script src="{{ asset('js') }}/nouislider.min.js"></script>	
	<script src="{{ asset('js') }}/jquery.magnific-popup.min.js"></script>  		
	<script src="{{ asset('js') }}/isotope.pkgd.min.js"></script> 
	<script src="{{ asset('js') }}/imagesloaded.pkgd.min.js"></script>
	<script src="{{ asset('js') }}/jquery.elevatezoom.js"></script>
	<script src="{{ asset('js') }}/jquery.colorbox-min.js"></script>
	<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
	<script type="text/javascript" src="{{ asset('js') }}/jquery.themepunch.tools.min.js"></script> 
	<script type="text/javascript" src="{{ asset('js') }}/jquery.themepunch.revolution.min.js"></script> 
	<!-- Custom --> 
	<script src="{{ asset('js') }}/custom.js"></script>			
	<script src="{{ asset('js') }}/js-index-01.js"></script>	
	<script src="{{ asset('js') }}/js-product.js"></script>

	<script>
		$(function () {
			$.ajaxSetup({

				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('#colorForProduct').on('click',function(e){
				$.ajax({
					type:'post',
					url:"{{ asset('getColor') }}",
					data:{
						code:$('#codeProduct').val(),
						size:$('#setSize').val(),

					},
					success:function(response){
						$('ul.options-swatch--color').remove();
						$('ul.options-swatch--size').remove();
						var html='<ul class="options-swatch options-swatch--color options-swatch--lg" style="padding:20px 0">';
						for (var i = 0; i < response.length; i++) {
							if (!(response[i].color=='black'||response[i].color=="brown")) {	
								var color ='black';
							}else{
								var color ='white';
							}
							var button='<li ><button type="button" style="background-color:'+response[i].color+';height:40px;width:40px;color:'+color+';padding:0px;font-size:10px"  onclick="choseColor('+response[i].id+')"><span class="swatch-label">'+response[i].color+'</span></button></li>';
							html=html+button;
						}
						html=html+'</ul>';
						console.log(html);
						$(html).insertAfter( "#colorForProduct" );
					},error:function (xhr, ajaxOptions, thrownError) {
						toastr.error(xhr.responseJSON.message);
					}
				});
			})
			$('#sizeForProduct').on('click',function(e){
				$.ajax({
					type:'post',
					url:"{{ asset('getSize') }}",
					data:{
						code:$('#codeProduct').val(),
						color:$('#setColor').val(),
					},
					success:function(response){
						console.log(response);
						$('ul.options-swatch--size').remove();
						$('ul.options-swatch--color').remove();
						var html='<ul class="options-swatch options-swatch--size options-swatch--lg" style="padding:20px 0">';
						for (var i = 0; i < response.length; i++) {
							var button='<li ><button type="button" style="height:40px;width:40px;padding:0px;"  onclick="choseSize('+response[i].id+')"><span class="swatch-label">'+response[i].size+'</span></button></li>';
							html=html+button;
						}
						html=html+'</ul>';
						$(html).insertAfter( "#sizeForProduct" );
					},error:function (xhr, ajaxOptions, thrownError) {
						toastr.error(xhr.responseJSON.message);
					}
				});
			})

			$('#addCustom').on('click',function(e){
				e.preventDefault();

				var newPost = new FormData();
				newPost.append('name',$('#name').val());
				newPost.append('email',$('#email').val());
				newPost.append('phone',$('#phone').val());
				newPost.append('address',$('#address').val());
				newPost.append('password',"");
				console.log(newPost);
				$.ajax({
					type:'post',
					url:"{{ asset('users/store') }}",
					data:newPost,
					dataType:'json',
					async:false,
					processData: false,
					contentType: false,
					success:function(response){
						console.log(response);
						setTimeout(function () {
							toastr.success('has been added');
                  // window.location.href="";
                  // 
              },1000);
						$('#vlxx').modal('hide');
						$('div.modal-backdrop').hide();
					}, error: function (xhr, ajaxOptions, thrownError) {
						console.log(xhr);
						if (!checkNull(xhr.responseJSON)) {
							$('p#sperrors').hide();
							if(!checkNull(xhr.responseJSON.errors.name))
							{
								for (var i = 0; i < xhr.responseJSON.errors.name.length; i++) {
									var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.name[i]+'</p>';
									console.log(html);
									$(html).insertAfter('#name');

								}
							};
							if(!checkNull(xhr.responseJSON.errors.content))
							{
								for (var i = 0; i < xhr.responseJSON.errors.content.length; i++) {
									var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.content[i]+'</p>';
									console.log(html);
									$(html).insertAfter('#contentdiv');

								}
							};
							if(!checkNull(xhr.responseJSON.errors.description))
								{console.log('test ok');
							for (var i = 0; i < xhr.responseJSON.errors.description.length; i++) {
								var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.description[i]+'</p>';
								console.log(html);
								$(html).insertAfter('#description');

							}
						};
						if(!checkNull(xhr.responseJSON.errors.sale_cost))
						{
							for (var i = 0; i < xhr.responseJSON.errors.sale_cost.length; i++) {
								var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.sale_cost[i]+'</p>';
								console.log(html);
								$(html).insertAfter('#tag');

							}
						}
						if (!checkNull(xhr.responseJSON.message)) {

							toastr.error(xhr.responseJSON.message);
						}
					};

				},

			})
			});
			function checkNull(value){
				return (value == null || value === '');
			}
		});



function choseColor(id){
	$.ajax({
		type:'post',
		url:"{{ asset('getColor-one') }}",
		data:{
			id:id,
		},
		success:function(response){
			$('#setColor').val(response.color);

			$('#colorForProduct').css('background-color',response.color);
			$('#colorForProduct').html(response.color);
			if (!(response.color=='black'||response.color=="brown")) {	
				$('ul.options-swatch--color').hide();
			}else{
				$('#colorForProduct').css('color','white');
				$('ul.options-swatch--color').hide();
			}
		},error:function (xhr, ajaxOptions, thrownError) {
			toastr.error(xhr.responseJSON.message);
		}
	});
}

function choseSize(id){
	$.ajax({
		type:'post',
		url:"{{ asset('getSize-one') }}",
		data:{
			id:id,

		},
		success:function(response){
			$('#sizeForProduct').html(response.size);
			$('#setSize').val(response.size);
			$('ul.options-swatch--size').hide();
		},error:function (xhr, ajaxOptions, thrownError) {
			toastr.error(xhr.responseJSON.message);
		}
	});
}



$('#addTocart').on('click',function(e){
	e.preventDefault();
	$.ajax({
		type:'post',
		url:"{{ asset('addToCart') }}",
		data:{
			code:$('#codeProduct').val(),
			quantity:$('#quantity').val(),
			color:$('#setColor').val(),
			size:$('#setSize').val(),
		},
		success:function(response){

			console.log(response);
			setTimeout(function () {
				toastr.success('has been added');},1000);
			$('#row-'+response.rowId).remove();
			var cart=				
			'<li class="cart__item" id=" row-'+response.rowId+'">'+
			'<div class="cart__item__image pull-left"><a href="#"><img src="'+response.options.image+'" alt=""/></a></div>'+
			'<div class="cart__item__control">'+
			'<div class="cart__item__delete"><a href="#" class="icon icon-delete" class=orderDelete rowId="'+response.rowId+'" class="icon icon-delete"><span>Delete</span></a></div>'+
			'</div>'+
			'<div class="cart__item__info">'+
			'<div class="cart__item__info__title">'+
			'<h2><a href="#">'+response.options.size+'</a></h2>'+
			'</div>'+
			'<div class="cart__item__info__price"><span class="info-label">Price:</span><span>$'+response.price+
			'</span></div>'+
			'<div class="cart__item__info__qty"><span class="info-label">Qty:</span><input type="text" class="input--ys" value="'+response.qty+'" /></div>'+
			'<div class="cart__item__info__details">'+
			'<div class="multitooltip">'+
			'<a href="#">Details</a>'+
			'<div class="tip on-bottom">'+
			'<span><strong>Color:</strong>'+response.options.color+'</span>'+
			'<span><strong>Quantity:</strong>'+response.qty+'</span>'+
			'<span><strong>Size:</strong>'+response.options.size+'</span>'+
			'</div>'+
			'</div>'+
			'</div>'+
			'</div>'+
			'</li>';
			$(cart).insertAfter('#flagOfCart');
			$('#TotalOfCart').html('$'+response.subtotal);
		},error:function (xhr, ajaxOptions, thrownError) {
			toastr.error(xhr.responseJSON.message);
		}
	});
})


</script>
@endsection
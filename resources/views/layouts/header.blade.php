<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Basic -->
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>YOURStore - Responsive HTML5 Template</title>
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="YOURStore - Responsive HTML5 Template">
	<meta name="author" content="etheme.com">
	<link rel="shortcut icon" href="{{ asset('css/favicon.ico') }}">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- External Plugins CSS -->
	<link rel="stylesheet" href="{{asset('css/slick.css')}}">
	<link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
	<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/settings.css')}}" media="screen" />
	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{ asset('css/css/style.css') }}">
	<!-- Icon Fonts  -->
	<link rel="stylesheet" href="{{ asset('css/font/style.css') }}">
	@yield('css')
	<!-- Head Libs -->	
	<!-- Modernizr -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
  <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	<script src="{{ asset('js') }}/modernizr.js"></script>
</head>
<body class="index">				  
	<div id="loader-wrapper">
		<div id="loader">
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
		</div>
	</div>
	<!-- Back to top -->
	<div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	<!-- /Back to top -->
	<!-- mobile menu -->
	<div class="hidden">
		<nav id="off-canvas-menu">				
			<ul class="expander-list">
				@foreach ($categories as $element)
				{{-- expr --}}
				<li>
					<span class="name">
						<span class="expander">-</span>
						<a href="index.html"><span class="act-underline">{{$element['name']}}</span></a>
					</span>
					{{-- <ul class="dropdown-menu megamenu image-links-layout" role="menu">												 --}}
							{{-- <li class="col-one-fourth">
								<span class="image-link">
								<a href="index.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-1.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 1 (Default)</span>
								</a>
								</span>
							</li> --}}
						{{-- </ul> --}}
					</li>					
					@endforeach
				</ul>
			</nav>
		</div>		
		<!-- /mobile menu -->
		<!-- HEADER section -->
		<div class="header-wrapper">
			<header id="header">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-6 col-xl-7">
							<!-- logo start --> 
							<a href="index.html"><img class="logo replace-2x img-responsive" src="{{ asset('') }}/images/logo.png" alt=""/> </a> 
							<!-- logo end --> 
						</div>
						<div class="col-sm-8 col-md-8 col-lg-6 col-xl-5 text-right">
							<!-- slogan start -->
							<div class="slogan"> Default welcome msg! </div>
							<!-- slogan end --> 						
							<div class="settings">
								<!-- currency start -->
								<div class="currency dropdown text-right">
									<div class="dropdown-label hidden-sm hidden-xs">Currency:</div>
									<a class="dropdown-toggle" data-toggle="dropdown"> USD<span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-menu--xs-full">
										<li><a href="#">GBP - British Pound Sterling</a></li>
										<li><a href="#">EUR - Euro</a></li>
										<li><a href="#">USD - US Dollar</a></li>
										<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>
									</ul>
								</div>
								<!-- currency end --> 
								<!-- language start -->
								<div class="language dropdown text-right">
									<div class="dropdown-label hidden-sm hidden-xs">Language:</div>
									<a class="dropdown-toggle" data-toggle="dropdown"> English<span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-menu--xs-full">
										<li><a href="#">English</a></li>
										<li><a href="#">German</a></li>
										<li><a href="#">Spanish</a></li>
										<li><a href="#">Russian</a></li>
										<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>
									</ul>
								</div>
								<!-- language end --> 
							</div>
						</div>
					</div>
				</div>
				<div class="stuck-nav">
					<div class="container offset-top-5">
						<div class="row">
							<div class="pull-left col-sm-9 col-md-9 col-lg-10">
								<!-- navigation start -->
								<nav class="navbar">
									<div class="responsive-menu mainMenu">									
										<!-- Mobile menu Button-->
										<div class="col-xs-2 visible-mobile-menu-on">
											<div class="expand-nav compact-hidden">
												<a href="#off-canvas-menu" class="off-canvas-menu-toggle">
													<div class="navbar-toggle"> 
														<span class="icon-bar"></span> 
														<span class="icon-bar"></span> 
														<span class="icon-bar"></span> 
														<span class="menu-text">MENU</span> 
													</div>
												</a>
											</div>
										</div>
										<!-- //end Mobile menu Button -->
										<ul class="nav navbar-nav">
											@foreach ($categories as $element)
											{{-- expr --}}
											<li class="dl-close"><a href="#"><span class="icon icon-close"></span>close</a></li>										
											<li class="dropdown dropdown-mega-menu">											
												<a href="index.html" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">{{$element['name']}}</span></a>
												{{-- <ul class="dropdown-menu megamenu image-links-layout" role="menu">												
													<li class="col-one-fourth">
														<span class="image-link">
														<a href="index.html">
														<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-1.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
														<span class="figcaption">Home page - Layout 1 (Default)</span>
														</a>
														</span>
													</li>
												</ul> --}}
											</li>											
											@endforeach
											
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<!-- navigation end -->
			<div class="pull-right col-sm-3 col-md-3 col-lg-2">
				<div class="text-right">	
					<!-- search start -->
					<div class="search link-inline">
						<a href="#" class="search__open"><span class="icon icon-search"></span></a>
						<div class="search-dropdown">
							<form action="#" method="get">
								<div class="input-outer">
									<input type="search" name="search" value="" maxlength="128" placeholder="SEARCH:">
									<button type="submit" title="" class="icon icon-search"></button>
								</div>
								<a href="#" class="search__close"><span class="icon icon-close"></span></a>									
							</form>
						</div>
					</div>
					<!-- search end -->										
					<!-- account menu start -->
					<div class="account link-inline">
						<div class="dropdown text-right">
							<a class="dropdown-toggle" data-toggle="dropdown">
								<span class="icon icon-person "></span>
							</a>
							<ul class="dropdown-menu dropdown-menu--xs-full">
								<li><a href="login_form.html"><span class="icon icon-person"></span>My Account</a></li>
								<li><a href="wishlist.html"><span class="icon icon-favorite_border"></span>My Wishlist</a></li>
								<li><a href="compare.html"><span class="icon icon-sort"></span>Compare</a></li>
								<li><a href="checkout-step.html"><span class="icon icon-done_all"></span>Checkout</a></li>
								<li><a href="#"  data-toggle="modal" data-target="#modalLoginForm"><span class="icon icon-lock"></span>Log In</a></li>
								<li><a href="login_form.html"><span class="icon icon-person_add"></span>Create an account</a></li>
								<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>
							</ul>
						</div>
					</div>
					<!-- account menu end -->
					<!-- shopping cart start -->
					<div class="cart link-inline">
						<div class="dropdown text-right">
							<a class="dropdown-toggle">
								<span class="icon icon-shopping_basket"></span>
								<span class="badge badge--cart">2</span>
							</a>
							<div class="dropdown-menu dropdown-menu--xs-full slide-from-top" role="menu">
								<div class="container">
									<div class="cart__top">Recently added item(s)</div>
									<a href="#" class="icon icon-close cart__close"><span>CLOSE</span></a>
									<ul id="cartCover">
										<input type="hidden" id="flagOfCart" value="">
										@foreach (Cart::content() as $element)
										<li class="cart__item" id="row-{{$element->rowId}}">
											<div class="cart__item__image pull-left">
												<a href="#"><img src="{{$element->options['image']}}" alt=""/></a>
											</div>

											<div class="cart__item__control">
												<div class="cart__item__delete"><a href="#" class=orderDelete rowId="{{$element->rowId}}" class="icon icon-delete"><span>Delete</span></a></div>
											</div>
											<div class="cart__item__info">
												<div class="cart__item__info__title">
													<h2><a href="#">{{ $element->name}}</a></h2>
												</div>
												<div class="cart__item__info__price"><span class="info-label">Price:</span><span>${{ number_format($element->price)}}</span></div>
												<div class="cart__item__info__qty"><span class="info-label">Qty:</span><input type="text" class="input--ys" value='1' /></div>
												<div class="cart__item__info__details">
													<div class='multitooltip'>
														<a href="#">Details</a>
														<div class="tip on-bottom">
															<span><strong>Color:</strong> {{ $element->options['color']}}</span>
															<span><strong>Quantity:</strong> {{ $element->qty}}</span>
															<span><strong>Size:</strong> {{ $element->options['size']}}</span>
														</div>
													</div>
												</div>
											</div>
										</li>
										@endforeach
									</ul>
									<div class="cart__bottom">
										<div class="cart__total">Cart subtotal: <span id="TotalOfCart">{{Cart::total()}}</span></div>
										<button class="btn btn--ys btn-checkout" id="checkOut" data-toggle="modal" href='#checkOut-modal'>Checkout <span class="icon icon--flippedX icon-reply"></span></button>
										<button class="btn btn--ys" id="deleteAll"><span class="icon icon-delete"></span>DELETE ALL ORDOR</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- shopping cart end -->
					<div class="modal fade" id="checkOut-modal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Your Information</h4>
								</div>
								<div class="modal-body">

									<div class="form-group">
										<label for="">Name:</label>
										<input type="text" class="form-control" id="cart-name" placeholder="Input field">
									</div>
									<div class="form-group">
										<label for="">Email:</label>
										<input type="email" class="form-control" id="cart-email" placeholder="Input field">
										<p style="color:red">Make sure your email account is already signed up at this site</p>
										<p>Otherwise sign up <a href="{{ asset('register') }}">here</a> to be able to track orders</p>
									</div>
									<div class="form-group">
										<label for="">Phone:</label>
										<input type="text" class="form-control" id="cart-phone" placeholder="Input field">
									</div>
									<div class="form-group">
										<label for="">Address:</label>
										<input type="text" class="form-control" id="cart-address" placeholder="Input field">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary" id="createOrder">Save changes</button>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
</header>
</div>
<!-- End HEADER section -->
@yield('content')










<!-- FOOTER section -->
<br><br><br><br>
<footer>
	<!-- footer-data -->
	<div class="container inset-bottom-60">
		<div class="row" >
			<div class="col-sm-12 col-md-5 col-lg-6 border-sep-right">
				<div class="footer-logo hidden-xs">
					<!--  Logo  --> 
					<a class="logo" href="index.html"> <img class="replace-2x" src="{{ asset('') }}images/logo.png" height="40px" alt="YOURStore"> </a> 
					<!-- /Logo --> 
				</div>
				<div class="box-about">
					<div class="mobile-collapse">
						<h4 class="mobile-collapse__title visible-xs">ABOUT US</h4>
						<div class="mobile-collapse__content">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.1619811559704!2d105.87400321455041!3d20.986143086021492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aea09f9ddadd%3A0x38bf94538b0710c9!2zNzkgVsSpbmggSMawbmcsIEhvw6BuZyBNYWksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1526373332530" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<!-- /subscribe-box --> 
			</div>
			<div class="col-sm-12 col-md-7 col-lg-6 border-sep-left">
				<div class="row">
					<div class="col-sm-4">
						<div class="mobile-collapse">
							<h4 class="text-left  title-under  mobile-collapse__title">INFORMATION</h4>
							<div class="v-links-list mobile-collapse__content">
								<ul>
									<li><a href="about.html">About Us</a></li>
									<li><a href="support-24.html">Customer Service</a></li>
									<li><a href="faq.html">Privacy Policy</a></li>
									<li><a href="site-map.html">Site Map</a></li>
									<li><a href="typography.html">Search Terms</a></li>
									<li><a href="warranty.html">Advanced Search</a></li>
									<li><a href="delivery-page.html">Orders and Returns</a></li>
									<li><a href="contact.html">Contact Us</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="mobile-collapse">
							<h4 class="text-left  title-under  mobile-collapse__title">WHY BUY FROM US</h4>
							<div class="v-links-list mobile-collapse__content">
								<ul>
									<li><a href="warranty.html">Shipping &amp; Returns</a></li>
									<li><a href="typography.html">Secure Shopping</a></li>
									<li><a href="about.html">International Shipping</a></li>
									<li><a href="delivery-page.html">Affiliates</a></li>
									<li><a href="support-24.html">Group Sales</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="mobile-collapse">
							<h4 class="text-left  title-under  mobile-collapse__title">MY ACCOUNT</h4>
							<div class="v-links-list mobile-collapse__content">
								<ul>
									<li><a href="login_form.html">Sign In</a></li>
									<li><a href="shopping_cart.html">View Cart</a></li>
									<li><a href="wishlist.html">My Wishlist</a></li>
									<li><a href="support-24.html">Track My Order</a></li>
									<li><a href="faq.html">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /footer-data --> 
	<div class="divider divider-md visible-xs visible-sm visible-md"></div>
	<!-- social-icon -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="social-links social-links--large">
					<ul>
						<li><a>79 Vĩnh Hưng Lĩnh Nam Hà Nội</a></li><br>
						<li><a> Điện Thoại:01662024622</a></li><br>
						<li><a>Email:vuthang.hustit@gmail.com</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- /social-icon --> 
	<!-- footer-copyright -->
	<div class="container footer-copyright">
		<div class="row">
			<div class="col-lg-12"> <a href="index.html"><span>Your</span>Store</a> &copy; 2016 . All Rights Reserved. </div>
		</div>
	</div>
	<!-- /footer-copyright --> 
	<a href="#" class="btn btn--ys btn--full visible-xs" id="backToTop">Back to top <span class="icon icon-expand_less"></span></a> 
</footer>
<!-- END FOOTER section -->
<div id="productQuickView" class="white-popup mfp-hide">
	<h1>Modal dialog</h1>
	<p>You won't be able to dismiss this by usual means (escape or
		click button), but you can close it programatically based on
		user choices or actions.
	</p>
</div>
<div id="compareSlide" class="hidden-xs">
	<div class="container">
		<div class="compareSlide__top">
			Compare
		</div>
		<a class="compareSlide__close icon icon-close">
		</a>
		<div class="compared-product-row">
			<div class="compared-product">
				<a href="#" class="compared-product__delete icon icon-delete"></a>
				<div class="compared-product__image"><a href="#"><img src="{{ asset('') }}/images/product/product-1.jpg" alt=""/></a></div>
				<a href="#" class="compared-product__name">Quis nostrud exercitation ullamco labori.</a>
			</div>
			<div class="compared-product">
				<a href="#" class="compared-product__delete icon icon-delete"></a>
				<div class="compared-product__image"><a href="#"><img src="{{ asset('') }}/images/product/product-1.jpg" alt=""/></a></div>
				<a href="#" class="compared-product__name">Quis nostrud exercitation ullamco labori.</a>
			</div>
			<div class="compared-product">
				<a href="#" class="compared-product__delete icon icon-delete"></a>
				<div class="compared-product__image"><a href="#"><img src="{{ asset('') }}/images/product/product-1.jpg" alt=""/></a></div>
				<a href="#" class="compared-product__name">Quis nostrud exercitation ullamco labori.</a>
			</div>
			<div class="compared-product">
				<a href="#" class="compared-product__delete icon icon-delete"></a>
				<div class="compared-product__image"><a href="#"><img src="{{ asset('') }}/images/product/product-1.jpg" alt=""/></a></div>
				<a href="#" class="compared-product__name">Quis nostrud exercitation ullamco labori.</a>
			</div>
			<div class="compared-product">
				<a href="#" class="compared-product__delete icon icon-delete"></a>
				<div class="compared-product__image"><a href="#"><img src="{{ asset('') }}/images/product/product-1.jpg" alt=""/></a></div>
				<a href="#" class="compared-product__name">Quis nostrud exercitation ullamco labori.</a>
			</div>
			<div class="compared-product">
				<a href="#" class="compared-product__delete icon icon-delete"></a>
				<div class="compared-product__image"><a href="#"><img src="{{ asset('') }}/images/product/product-1.jpg" alt=""/></a></div>
				<a href="#" class="compared-product__name">Quis nostrud exercitation ullamco labori.</a>
			</div>
		</div>
		<div class="compareSlide__bot">
			<a href="#" class="clear-all icon icon-delete"><span>Clear All</span></a>
			<a href="#" class="btn btn--ys btn-compare"><span class="icon icon-shopping_basket"></span> Compare</a>
		</div>
	</div>
</div>
<!-- Button trigger modal -->


<!--================== modal ==================-->
<!-- modalAddToCart -->
<div class="modal  fade"  id="modalAddToCart" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog white-modal modal-sm">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					"Mauris lacinia lectus" added to cart successfully! 
				</div>
			</div>
			<div class="modal-footer text-center">		       	
				<a href="shopping-cart-right-column.html"  class="btn btn--ys btn--full btn--lg">go to cart</a>
			</div>
		</div>
	</div>
</div>
<!-- /modalAddToCart -->
<!-- modalLoginForm-->
<div class="modal  fade"  id="modalLoginForm" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog white-modal modal-sm">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
				<h4 class="modal-title text-center text-uppercase">Login form</h4>
			</div>
			<form>
				<div class="modal-body indent-bot-none">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<span class="icon icon-person"></span>
							</span>
							<input type="text" id="LoginFormName" class="form-control" placeholder="Name:">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">@</span>
							<input type="password" id="LoginFormPass" class="form-control" placeholder="Password:">
						</div>
					</div>			         				    				     
					<div class="checkbox-group">
						<input type="checkbox" id="checkBox2">
						<label for="checkBox2"> 
							<span class="check"></span>
							<span class="box"></span>
							Remember me
						</label>
					</div>
					<button type="button" class="btn btn--ys btn--full btn--lg">Login</button>
					<div class="divider divider--xs"></div>
					<button type="button" class="btn btn--ys btn--full btn--lg btn-blue"><span class="fa fa-facebook"></span> Login with Facebook</button>
					<div class="divider divider--xs"></div>
					<button type="button" class="btn btn--ys btn--full btn--lg btn-red"><span class="fa fa-google-plus"></span> Login with Google</button>
					<div class="divider divider--xs"></div>
					<ul class="list-arrow-right">
						<li><a href="#">Forgot your username?</a></li>
						<li><a href="#">Forgot your password?</a></li>
						<li><a href="#">Create an account</a></li>
					</ul>
				</div>			      
			</form>
		</div>
	</div>
</div>	
<!-- /modalLoginForm-->

<!-- / Modal (quickViewModal) -->
<!-- Modal (newsletter) -->		
<div class="modal  modal--bg fade"  id="newsletterModal" data-pause=2000>
	<div class="modal-dialog white-modal">
		<div class="modal-content modal-md">
			<div class="modal-bg-image bottom-right"> 
				<img  src="{{ asset('') }}/images/custom/newsletter-bg.png" alt="" class="img-responsive"> 
			</div>
			<div class="modal-block">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
				</div>
				<div class="modal-newsletter text-center">
					<img class="logo img-responsive1 replace-2x" src="{{ asset('') }}/images/logo.png" alt=""/>
					<h2 class="text-uppercase modal-title">JOIN US NOW!</h2>
					<p class="color-dark">And get hot news about the theme</p>
					<p class="color font24 custom-font font-lighter">
						YOURStore 
					</p>
					<form  method="post" name="mc-embedded-subscribe-form" target="_blank" class="subscribe-form">
						<div class="row-subscibe">			           				            		 
							<input  type="text" name="subscribe"   placeholder="Your E-mail">
							<button type="submit" class="btn btn--ys btn--xl">SUBSCRIBE</button>
						</div>
						<div class="checkbox-group form-group-top clearfix">
							<input type="checkbox" id="checkBox1">
							<label for="checkBox1"> 
								<span class="check"></span>
								<span class="box"></span>
								&nbsp;&nbsp;DON&#39;T SHOW THIS POPUP AGAIN
							</label>
						</div>			               			                

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- / Modal (newsletter) -->
<!--================== /modal ==================-->





<!-- jQuery 1.10.1--> 

@yield('js')	
<!-- Custom -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script> 
<script>
	$(function () {
    $.ajaxSetup({

      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
})
	$('#cart-phone').on('keypress', function(e){
  return e.metaKey || // cmd/ctrl
    e.which <= 0 || // arrow keys
    e.which == 8 || // delete key
    /[0-9]/.test(String.fromCharCode(e.which)); // numbers
})
	$('#checkOut').on('click', function(e){
  		e.preventDefault();
		$('.open').removeClass('open');

})
	$('#createOrder').on('click',function(e){
		e.preventDefault();
		$.ajax({
			type:'post',
			url:"{{ asset('createOrder') }}",
			data:{
				address:$('#cart-address').val(),
				name:$('#cart-name').val(),
				email:$('#cart-email').val(),
				phone:$('#cart-phone').val(),
			},
			success:function(response){
				toastr.success('Đặt hàng thành công!');
				$('#checkOut-modal').modal('hide');
			},error:function (xhr, ajaxOptions, thrownError) {
				toastr.error(xhr.responseJSON.message);
			}
		});
	})
	$('.orderDelete').on('click',function(e){
		e.preventDefault();
		var id=$(this).attr('rowId');
		console.log(id);
		$('.open').removeClass('open');
		var path = "{{ asset('orderDelete') }}/" + id;
        swal({
          title: "Bạn có chắc muốn xóa?",
        // text: "Bạn sẽ không thể khôi phục lại bản ghi này!!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Không",
        confirmButtonText: "Có",
        // closeOnConfirm: false,
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            type: "delete",
            url: path,
            success: function(res)
            {
              if(!res.error) {
                toastr.success('Xóa thành công!');
                $('#row-'+id).remove();
                
                $('#TotalOfCart').html(res);
                  //setTimeout(function () {
                    //location.reload();
                  //}, 1000)
                }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError);
              }
            });
        } else {
          toastr.error("Thao tác xóa đã bị huỷ bỏ!");
        }
      });
	})
	$('#deleteAll').on('click',function(e){
		e.preventDefault();
		$('.open').removeClass('open');
		var path = "{{ asset('deleteAll') }}";
        swal({
          title: "Bạn có chắc muốn xóa?",
        // text: "Bạn sẽ không thể khôi phục lại bản ghi này!!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Không",
        confirmButtonText: "Có",
        // closeOnConfirm: false,
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            type: "delete",
            url: path,
            success: function(res)
            {
              if(!res.error) {
                toastr.success('Xóa thành công!');
                $('.cart__item').remove();
                
                $('#TotalOfCart').html(res);
                  //setTimeout(function () {
                    //location.reload();
                  //}, 1000)
                }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError);
              }
            });
        } else {
          toastr.error("Thao tác xóa đã bị huỷ bỏ!");
        }
      });
	})
	
</script>

</body>
</html>
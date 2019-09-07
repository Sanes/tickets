<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	@yield('title')
	<link rel="stylesheet" href="https://unpkg.com/lite-editor@1.6.39/css/lite-editor.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/css/uikit.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/js/uikit.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.7/js/uikit-icons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://unpkg.com/lite-editor@1.6.39/js/lite-editor.min.js"></script>
<style>
	.lite-editor,
	.lite-editor-source {
		font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
		font-size: .875rem;
	}	
	.uk-navbar-nav > li > a, .uk-navbar-item, .uk-navbar-toggle {padding: 0 10px;}
	tr:nth-child(even),thead  {background: #f5f5f5;}
	.uk-pagination>li>a {color: #1e87f0;}
</style>
</head>
<body>
	<div class=" uk-margin-bottom uk-background-primary">
		<div class="uk-container">
			<nav class="uk-navbar-transparent uk-light" uk-navbar>
				<div class="uk-navbar-left">
					<a href="{{ url('/') }}" class="uk-logo uk-text-uppercase uk-flex uk-flex-middle" style="color: #fff;">
						<span uk-icon="icon: cog; ratio: 1.8" class="uk-margin-small-right"></span>{{ config('app.name', 'Laravel') }}
					</a>
				</div>
				<div class="uk-navbar-right">
					<ul class="uk-navbar-nav">
<!-- 						<li><a href="/admin/ticket">Admin</a></li>
						<li><a href="/customer/ticket">Customer</a></li> -->
						@auth
						<li class="uk-">
							<a href="#"><span uk-icon="icon: user; ratio: 1" class="uk-margin-small-right"></span>Профиль<span uk-icon="icon: chevron-down; ratio: 1" class="uk-margin-small-left"></span></a>
						</li>
						<!-- <li class=""><a href="">Баланс 0 ₽</a></li> -->
						@endauth	
					</ul>
				</div>
			</nav>			
		</div>
	</div>	
	<div class="uk-container uk-margin-bottom" style="min-height: calc(100vh - 190px);">
		@yield('content')
	</div>
	<section class="uk-section uk-section-xsmall uk-section-muted uk-text-center uk-text-small uk-text-uppercase" style="background: #f3f3f3;">
		&copy; 2019
	</section>
	@include('admin.sidebar')
	@yield('js')
	<script>
	$('#menu-button').hover(function(){

	UIkit.offcanvas('#offcanvas-overlay').show();

	});
	$('.uk-offcanvas-bar').mouseleave(function(){
		UIkit.offcanvas('#offcanvas-overlay').hide();
	});
	</script>
</body>
</html>
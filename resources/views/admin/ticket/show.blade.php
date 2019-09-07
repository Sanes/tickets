@extends('admin.base')
@section('title')
<title>Запрос # {{ $ticket->id }}</title>
@endsection

@section('content')
	<div class="uk-grid uk-grid-small" uk-grid>
		<div class="uk-width-2-3@m">
			<h3 class="uk-h3">Запрос # {{ $ticket->id }}</h3>
			<div class="uk-card uk-card-small uk-card-primary uk-box-shadow-large">
				<div class="uk-card-body">
					<div class="uk-child-width-1-2 uk-grid-small" uk-grid>
						<div class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: user"></span>{{ $ticket->user->name }}</div>
						<div class="uk-flex uk-flex-middle uk-flex-right"><span class="uk-margin-small-right" uk-icon="icon: clock"></span>{{ $ticket->created_at }}</div>
						<div class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: info"></span>
						@if($ticket->status === 100)
							В очереди
						@elseif($ticket->status === 200 or $ticket->status === 201)
							Отвечен
						@else
						error
						@endif
						</div>
					</div>
					<hr>
					<h3 class=" uk-margin-small-top">{{ $ticket->title }}</h3>
					<ul uk-accordion="collapsible: true;">
					    <li>
					        <a class="uk-accordion-title uk-width-medium" href="#">Подробности запроса</a>
					        <div class="uk-accordion-content">
					        	{!! strip_tags($ticket->description, '<a><br><b><u><i><strong>') !!}
					        </div>
					    </li>
					</ul>
				</div>
			</div>
				@if(Route::currentRouteName() === 'admin.ticket.newest')
				@include('admin.comment.newest')
				@else
				@include('admin.comment.index')
				@endif
			<h3 class="">Добавить</h3>
			<ul uk-tab>
			    <li><a href="#">Комментарий</a></li>
			    <li><a href="#">Ссылку</a></li>
			    <li><a href="#">Файл</a></li>
			</ul>

			<ul class="uk-switcher uk-margin">
			    <li>
			    	<form action="{{ route('admin.comment.store') }}" class="" method="post">
			    		{{ csrf_field() }}
			    		<input type="hidden" name="id" value="{{ $ticket->id }}">
			    		<textarea name="body" id="" cols="30" rows="10" class="js-editor" required="" onfocus=""></textarea>
					    <div class="uk-margin">
					    	<div class="uk-form-controls">
						    	<button type="submit" class="uk-button uk-button-primary uk-margin-small-right"><span class="uk-margin-small-right" uk-icon="icon: plus;"></span>Отправить</button>
						    	<a href="{{route('admin.ticket.index')}}" class="uk-button uk-button-danger uk-margin-right"><span class="uk-margin-small-right" uk-icon="icon: forward;"></span>Отмена</a>
					    	</div>
					    </div>
			    	</form>
			    </li>
			    <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
			    <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur, sed do eiusmod.</li>
			</ul>
		</div>
		<div class="uk-width-1-3@m">
			<div class="uk-padding-small" style="background: #f3f3f3;">
				<!-- <h3 class="uk-margin-small-bottom uk-margin-small-top">Материалы по запросу</h3> -->
				<h4 class="uk-margin-small-bottom uk-margin-small-top">Ссылки</h4>
				<ul class="uk-list">
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: link"></span><a href="">Lorem ipsum dolor sit.</a></li>
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: link"></span><a href="">Quia maiores, at impedit.</a></li>
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: link"></span><a href="">Unde necessitatibus sapiente inventore.</a></li>
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: link"></span><a href="">Adipisci tempora iste, neque.</a></li>
					<li><a href="" class="uk-link-muted">Управление ссылками</a></li>
				</ul>
				<h4 class="uk-margin-small-bottom uk-margin-small-top">Файлы</h4>
				<ul class="uk-list">
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: file-pdf"></span><a href="">Lorem ipsum dolor sit.</a></li>
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: file-pdf"></span><a href="">Praesentium aspernatur, cupiditate totam!</a></li>
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: file-pdf"></span><a href="">Vel tempora itaque iure!</a></li>
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: file-pdf"></span><a href="">Nesciunt amet aliquid molestiae!</a></li>
					<li class="uk-flex uk-flex-middle"><a href="" class="uk-link-muted">Управление файлами</a></li>
				</ul>
				<h4 class="uk-margin-small-bottom uk-margin-small-top">Счета</h4>
				<ul class="uk-list">
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: check"></span><a href="">Предоплата</a></li>
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: print"></span><a href="">Расчет по выполненной работе</a></li>
					<li><a href="" class="uk-link-muted">Управление счетами</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="uk-position-absolute uk-position-fixed uk-position-bottom-right uk-margin-bottom uk-light">
		<a class="uk-icon-button scrollup" uk-icon="arrow-up" style="background: #a5a5a5; border-radius: 0;" uk-scroll></a>
	</div>
@endsection
@section('js')
<script>
  window.addEventListener('DOMContentLoaded',function(){
    const WYSIWYG = new LiteEditor('.js-editor', {
    	minHeight: 150
    });
  });
@if (Session::has('latest'))
$( ".comment" ).last().addClass( "last" );
 UIkit.scroll('title').scrollTo('.last');
@endif

var count = $(".comment").length;
if(count < 20){

$(".read-more").addClass("uk-hidden");
}

 
$(window).scroll(function(){
	if ($(this).scrollTop() > 1000) {
	$('.scrollup').fadeIn();
	} else {
	$('.scrollup').fadeOut();
	}
}); 

</script>
@endsection
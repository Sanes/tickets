@extends('customer.base')
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
						@elseif($ticket->status === 110)
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
				@if(Route::currentRouteName() === 'customer.ticket.newest')
				@include('customer.comment.newest')
				@else
				@include('customer.comment.index')
				@endif
			@if($ticket->status === 201)
			<form action="{{ route('customer.ticket.mark-read') }}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $ticket->id }}">
				<input type="hidden" name="status" value="200">
				<button class="uk-button uk-button-link uk-align-center" type="submit">Отметить прочитанным</button>
			</form>
			@endif
			<h3 class="uk-margin-remove-top">Добавить</h3>
			<ul uk-tab>
			    <li><a href="#">Комментарий</a></li>
			    <li><a href="#">Ссылку</a></li>
			    <li><a href="#">Файл</a></li>
			</ul>

			<ul class="uk-switcher uk-margin">
			    <li>
			    	<form action="{{ route('customer.comment.store') }}" class="" method="post">
			    		{{ csrf_field() }}
			    		<input type="hidden" name="id" value="{{ $ticket->id }}">
			    		<textarea name="body" id="" cols="30" rows="10" class="js-editor" required="" onfocus=""></textarea>
					    <div class="uk-margin">
					    	<div class="uk-form-controls">
						    	<button type="submit" class="uk-button uk-button-primary uk-margin-small-right"><span class="uk-margin-small-right" uk-icon="icon: plus;"></span>Отправить</button>
						    	<a href="{{route('customer.ticket.index')}}" class="uk-button uk-button-danger uk-margin-right"><span class="uk-margin-small-right" uk-icon="icon: forward;"></span>Отмена</a>
					    	</div>
					    </div>
			    	</form>
					<form action="{{ route('customer.ticket.mark-read') }}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $ticket->id }}">
						<input type="hidden" name="status" value="300">
				    	<button class="uk-button uk-button-link" type="submit"><span class="uk-margin-small-right" uk-icon="icon: future;"></span>Перенести в архив</button>
					</form>
			    </li>
			    <li>В разработке</li>
			    <li>В разработке</li>
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
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: download"></span><a href="">Lorem ipsum dolor sit.</a></li>
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: download"></span><a href="">Praesentium aspernatur, cupiditate totam!</a></li>
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: download"></span><a href="">Vel tempora itaque iure!</a></li>
					<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: download"></span><a href="">Nesciunt amet aliquid molestiae!</a></li>
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
</script>
@endsection
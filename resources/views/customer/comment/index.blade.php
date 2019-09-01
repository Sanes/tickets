<h3 class="">Комментарии по запросу ({{ $comments->total() }})</h3>
{{ $comments->links('pagination') }}
@forelse($comments as $comment)
<div class="uk-card uk-card-small uk-margin-bottom uk-box-shadow-large comment">
	@if($ticket->user->id === $comment->user_id)
	<div class="uk-card-body">
	@else
	<div class="uk-card-body" style="background: #FFFFE0;">
	@endif
		<div class="uk-child-width-1-2 uk-grid-small uk-text-small uk-text-muted" uk-grid>
			<div class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" uk-icon="icon: user"></span>{{ $comment->user->name }}</div>
			<div class="uk-flex uk-flex-middle uk-flex-right"><span class="uk-margin-small-right" uk-icon="icon: clock"></span>{{ $comment->created_at }}</div>	
		</div>
		<hr>
		<div class="">
		{!! strip_tags($comment->body, '<a><br><b><u><i><strong>') !!}
		</div>
	</div>
</div>
@empty
<div class="uk-card uk-card-default uk-box-shadow-large uk-margin-bottom">
	<div class="uk-card-body uk-text-center">
		У запроса нет комментариев.
	</div>
</div>
@endforelse
<div class="uk-margin-large-top">
	{{ $comments->links('pagination') }}
</div>
@if($ticket->status === 201)
<form action="{{ route('customer.ticket.mark-read') }}" method="post">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{ $ticket->id }}">
	<input type="hidden" name="status" value="200">
	<button class="uk-button uk-button-link uk-align-center" type="submit">Отметить прочитанным</button>
</form>
@endif
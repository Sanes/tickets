@extends('customer.base')
@section('title')
<title>Открытые запросы</title>
@endsection
@section('content')
<h3 class="">Открытые запросы</h3>
<!-- <div class="uk-child-width-1-2" uk-grid>
	<div>
	</div>
	<div class="uk-text-right">
		<a href="{{ route('customer.ticket.create') }}" class="uk-button uk-button-default"><span uk-icon="icon: comment" class="uk-margin-small-right"></span>Отправить запрос</a>
	</div>
</div> -->

<table class="uk-table uk-table-hover uk-table-middle uk-table-small">
	<thead>
		<tr>
			<th class="uk-table-shrink">#</th>
			<th>Тема</th>
			<!-- <th class="uk-table-shrink">Пользователь</th> -->
			<td class="uk-table-shrink">Статус</td>
			<th class="uk-table-shrink uk-text-right">Обновлен</th>
		</tr>
	</thead>
@forelse($tickets as $ticket)
<tr>
	<td>{{ $ticket->id }}</td>
	<td class="uk-table-link"><a href="{{ route('customer.ticket.show', $ticket->id, false) }}/newest" class="uk-link-reset">{{ $ticket->title }}</a></td>
	<!-- <td class="uk-text-small uk-text-nowrap">{{ $ticket->user->name }}</td> -->
	@if($ticket->status === 100)
	<td class="uk-text-nowrap uk-text-muted"><span uk-icon="icon: clock" class="uk-margin-small-right"></span>в ожидании</td>
	@elseif($ticket->status === 101)
	<td class="uk-text-nowrap uk-text-muted"><span uk-icon="icon: clock" class="uk-margin-small-right"></span>в работе</td>
	@elseif($ticket->status === 201)
	<td class="uk-text-nowrap uk-text-success"><span uk-icon="icon: mail" class="uk-margin-small-right"></span>сообщение</td>
	@elseif($ticket->status === 200)
	<td class="uk-text-nowrap uk-text-success"><span uk-icon="icon: check" class="uk-margin-small-right"></span>обработан</td>
	@endif
	<td class="uk-text-nowrap uk-text-small uk-text-right">{{\Carbon\Carbon::parse($ticket->updated_at)->shortRelativeDiffForHumans()}}</td>
</tr>
@empty
<tr>
	<td colspan="4">Здесь ничего нет!</td>
</tr>
@endforelse
</table>
{{ $tickets->links('pagination') }}
@endsection

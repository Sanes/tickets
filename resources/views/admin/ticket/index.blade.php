@extends('customer.base')
@section('title')
<title>Открытые запросы</title>
@endsection
@section('content')
<h3 class="">Открытые запросы</h3>

<table class="uk-table uk-table-hover uk-table-middle uk-table-small uk-text-small">
	<thead>
		<tr>
			<th class="uk-table-shrink">#</th>
			<th>Тема</th>
			<th class="uk-table-shrink">Статус</th>
			<th class="uk-table-shrink">Пользователь</th>
			<th class="uk-table-shrink">Обновлен</th>
		</tr>
	</thead>
@forelse($tickets as $ticket)
<tr>
	<td>{{ $ticket->id }}</td>
	<td class="uk-table-link"><a href="{{ route('admin.ticket.show', $ticket->id, false) }}" class="uk-link-reset">{{ $ticket->title }}</a></td>
	@if($ticket->status === 100)
	<td class="uk-text-nowrap uk-text-warning">В очереди</td>
	@elseif($ticket->status === 110)
	<td class="uk-text-nowrap uk-text-success">Новое сообщение</td>
	@endif
	<td class="uk-text-small uk-text-nowrap">{{ $ticket->user->name }}</td>
	<td class="uk-text-nowrap uk-text-small">{{\Carbon\Carbon::parse($ticket->updated_at)->shortRelativeDiffForHumans()}}</td>
</tr>
@empty
<tr>
	<td colspan="4">Нет открытых запросов</td>
</tr>
@endforelse
</table>
@endsection
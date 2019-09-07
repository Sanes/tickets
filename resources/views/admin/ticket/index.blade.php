@extends('admin.base')
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
			<th class="uk-table-shrink uk-text-right">Обновлен</th>
		</tr>
	</thead>
@forelse($tickets as $ticket)
<tr>
	<td>{{ $ticket->id }}</td>
	<td class="uk-table-link"><a href="{{ route('admin.ticket.newest', $ticket->id, false) }}" class="uk-link-reset">{{ $ticket->title }}</a></td>
	@if($ticket->status === 100)
	<td class="uk-text-nowrap uk-text-success"><span uk-icon="icon: mail" class="uk-margin-small-right"></span>сообщение</td>
	@elseif($ticket->status === 101)
	<td class="uk-text-nowrap uk-text-muted"><span uk-icon="icon: clock" class="uk-margin-small-right"></span>в работе</td>
	@elseif($ticket->status === 200 || $ticket->status === 201)
	<td class="uk-text-nowrap uk-text-success"><span uk-icon="icon: check" class="uk-margin-small-right"></span>обработан</td>
	@endif
	<td class="uk-text-small uk-text-nowrap uk-text-center">{{ $ticket->user->name }}</td>
	<td class="uk-text-nowrap uk-text-small">{{\Carbon\Carbon::parse($ticket->updated_at)->shortRelativeDiffForHumans()}}</td>
</tr>
@empty
<tr>
	<td colspan="4">Нет открытых запросов</td>
</tr>
@endforelse
</table>
@endsection
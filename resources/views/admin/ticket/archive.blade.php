@extends('admin.base')
@section('title')
<title>Архив запросов</title>
@endsection
@section('content')
<h3 class="">Архив запросов</h3>
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
			<td class="uk-width-small">Статус</td>
			<th class="uk-table-shrink">Обновлен</th>
		</tr>
	</thead>
@forelse($tickets as $ticket)
<tr>
	<td>{{ $ticket->id }}</td>
	<td class="uk-table-link"><a href="{{ route('admin.ticket.show', $ticket->id, false) }}/newest" class="uk-link-reset">{{ $ticket->title }}</a></td>
	<td class="uk-text-nowrap uk-text-muted"><span uk-icon="icon: trash" class="uk-margin-small-right"></span>в архиве</td>
	<td class="uk-text-nowrap uk-text-small">{{\Carbon\Carbon::parse($ticket->updated_at)->shortRelativeDiffForHumans()}}</td>
</tr>
@empty
<tr>
	<td colspan="4">Здесь ничего нет!</td>
</tr>
@endforelse
</table>
{{ $tickets->links('pagination') }}
@endsection
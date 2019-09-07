<div id="offcanvas-overlay" uk-offcanvas="overlay: true; mode: slide;">
    <div class="uk-offcanvas-bar uk-background-primary uk-overflow-auto uk-height-viewport">
        <h4 class="uk-text-uppercase uk-link-reset"><a href="" class=" uk-flex uk-flex-middle"><span uk-icon="icon: cog; ratio: 1.3" class="uk-margin-small-right"></span>{{ config('app.name', 'Laravel') }}</a></h4>
        <ul class="uk-nav uk-nav-default">
        	<li class="uk-nav-header uk-active">Запросы</li>
        	@if(Route::currentRouteName() === 'admin.ticket.index') 
            <li class="uk-active">
            	<a href="{{ route('admin.ticket.index') }}"><span class="uk-margin-small-right" uk-icon="icon: comment"></span>Открытые запросы</a>
            </li>
            @else
            <li>
            	<a href="{{ route('admin.ticket.index') }}"><span class="uk-margin-small-right" uk-icon="icon: comment"></span>Открытые запросы</a>
            </li>
        	@endif
            <li @if(Route::currentRouteName() === 'admin.ticket.archive') class="uk-active" @endif>
            	<a href="{{ route('admin.ticket.archive') }}"><span class="uk-margin-small-right" uk-icon="icon: trash"></span>Архив запросов</a>
            </li>
            <li @if(Route::currentRouteName() === 'admin.ticket.create') class="uk-active" @endif>
            	<a href="{{ route('admin.ticket.create') }}"><span class="uk-margin-small-right" uk-icon="icon: mail"></span>Отравить запрос</a>
            </li>
            <li class="uk-nav-header uk-active">Управление счетами</li>
            <li>
            	<a href="{{ route('admin.ticket.index') }}"><span class="uk-margin-small-right" uk-icon="icon: clock"></span>Счета к оплате</a>
            	<a href="{{ route('admin.ticket.index') }}"><span class="uk-margin-small-right" uk-icon="icon: trash"></span>Архив счетов</a>
            </li>
        </ul>
    </div>
</div>



<div class="uk-position-absolute uk-position-fixed uk-position-center-left uk-background-primary uk-light" >
	<a class="uk-icon-button" uk-icon="expand" style="border-radius: 0;" id="menu-button"></a>
</div>
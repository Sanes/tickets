@extends('admin.base')
@section('title')
<title>Отправить запрос</title>
@endsection

@section('content')
<h3 class="uk-h3">Отправить запрос</h3>
<form action="/customer/ticket/store" method="post" class="uk-form-horizontal">
	{{ csrf_field() }}

	<div class="uk-grid-match uk-grid-small" uk-grid>
		<div class="uk-width-2-3@l uk-width-2-3@m">
			
			<div>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="title">Тема<sup class="uk-text-danger">*</sup></label>
			        <div class="uk-form-controls">
			            <input class="uk-input" id="title" type="text" placeholder="" name="title" autofocus="">
			        </div>
			    </div>


		        <div class="uk-margin">
		        	<label class="uk-form-label" for="description">Запрос</label>
		        	<div class="uk-form-controls">
			            <textarea class="uk-textarea js-editor" id="description" rows="10" placeholder="" name="description"></textarea>
		        	</div>
		        </div>

			    <div class="uk-margin">
			    	<div class="uk-form-controls">
				    	<button type="submit" class="uk-button uk-button-primary uk-margin-small-right"><span class="uk-margin-small-right" uk-icon="icon: plus;"></span>Добавить</button>
				    	<a href="/admin/node" class="uk-button uk-button-danger uk-margin-right"><span class="uk-margin-small-right" uk-icon="icon: forward;"></span>Отмена</a>
			    	</div>
			    </div>
			</div>
		</div>
		<div class="uk-width-1-3@l uk-visible@l">
			<div class="uk-padding-small" style="background: #f3f3f3;">
				<h3 class="uk-heading-divider">Помощь</h3>

			</div>
		</div>
	</div>
</form>
@endsection
@section('js')
<script>
  window.addEventListener('DOMContentLoaded',function(){
    const WYSIWYG = new LiteEditor('.js-editor', {
    	minHeight: 250
    });
  });
</script>
@endsection
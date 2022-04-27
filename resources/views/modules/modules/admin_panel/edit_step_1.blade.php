@extends('admin.master')


@section('pageMetaTitle')
    Modules > {{ $moduleLevel -> module -> alias }} > {{ $moduleLevel -> title }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'Modules',
		'tag0Url' => route('moduleStartPoint'),
		'tag1Text' => $moduleLevel -> module -> alias,
		'tag1Url' => route('moduleEdit', $moduleLevel -> module -> id),
		'tag2Text' => $moduleLevel -> title
	])


	@include('admin.includes.bar', [
		'addUrl' => route('moduleLevelAdd', $moduleLevel -> module -> id),
		'deleteUrl' => route('moduleLevelDelete', array($moduleLevel -> module -> id, $moduleLevel -> id)),
		'nextId' => $next,
		'prevId' => $prev,
		'nextRoute' => route('moduleLevelEdit', [$moduleLevel -> module -> id, $next]),
		'prevRoute' => route('moduleLevelEdit', [$moduleLevel -> module -> id, $prev]),
		'backRoute' => route('moduleEdit', $moduleLevel -> module -> id)
	])

	<div class="p-2">
		@if($errors -> any())
			<div class="p-2">
				<div class="alert alert-danger m-0">
					{{ __('bsw.warningStatus') }}
				</div>
			</div>
		@endif
		
		
		@if(Session :: has('successStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session :: get('successStatus') }}
				</div>
			</div>
		@endif


		@if(Session :: has('successDeleteStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session :: get('successDeleteStatus') }}
				</div>
			</div>
		@endif


		{{ Form :: model($moduleLevel, array('route' => array('moduleLevelUpdate', $moduleLevel -> module -> id, $moduleLevel -> id))) }}
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>Title: *</span>
						<span>(Example: Category)</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('title') }}
					</div>
				</div>

				@error('title')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2 submit-button">
				{{ Form :: submit('Submit') }}
			</div>
		{{ Form :: close() }}
	

		<div class="p-3"></div>

		@include('admin.includes.addButton', ['text' => 'Add Step', 'url' => route('moduleStepAdd', array($moduleLevel -> module -> id, $moduleLevel -> id))])

		<div id="rangBlocks" data-db_table="module_steps">
			@foreach($moduleLevel -> moduleStep as $data)
				@include('admin.includes.horizontalEditDeleteBlock', [
					'id' => $data -> id,
					'title' => $data -> db_table,
					'text' => $data -> title,
					'editLink' => route('moduleStepEdit', array($moduleLevel -> module -> id, $moduleLevel -> id, $data -> id)),
					'deleteLink' => route('moduleStepDelete', array($moduleLevel -> module -> id, $moduleLevel -> id, $data -> id))
				])
			@endforeach
		</div>
	</div>
@endsection
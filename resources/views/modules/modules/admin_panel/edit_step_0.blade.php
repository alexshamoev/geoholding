@extends('admin.layouts.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'Modules',
		'tag0Url' => route('moduleStartPoint'),
		'tag1Text' => $module -> alias
	])


	@include('admin.includes.bar', [
		'addUrl' => route('moduleAdd'),
		'deleteUrl' => route('moduleDelete', $module -> id),
		'nextId' => $nextModuleId,
		'prevId' => $prevModuleId,
		'nextRoute' => route('moduleEdit', $nextModuleId),
		'prevRoute' => route('moduleEdit', $prevModuleId),
		'backRoute' => route('moduleStartPoint')
	])


	{{ Form :: model($module, array('route' => array('moduleUpdate', $module -> id))) }}
		<div class="p-2">
			{{ Form :: text('alias') }}
		</div>

		<div class="p-2">
			@foreach($languages as $data)
				{{ Form :: text('title_'.$data -> title) }}
			@endforeach

			<div class="p-2">
				<label>
					{{ Form :: checkbox('hide_for_admin', '1') }}

					hide_for_admin?
				</label>
			</div>

			<div class="p-2">
				გვერდი
				<br>
				{{ Form :: select('page', $pagesForSelect, $module -> page) }}
			</div>

			<div class="p-2">
				ფერი:
				<br>
				{{ Form :: text('icon_bg_color') }}
			</div>
		</div>

	
		{{ Form :: submit('Submit') }}
	{{ Form :: close() }}


	@include('admin.includes.addButton', ['text' => 'Step', 'url' => route('moduleStepAdd', $module -> id)])


    <div>
		@foreach($moduleSteps as $data)
			@include('admin.includes.horizontalEditDeleteBlock', [
				'title' => $data -> title,
				'editLink' => route('moduleStepEdit', array($module -> id, $data -> id)),
				'deleteLink' => route('moduleStepDelete', array($module -> id, $data -> id))
			])
		@endforeach
    </div>
@endsection

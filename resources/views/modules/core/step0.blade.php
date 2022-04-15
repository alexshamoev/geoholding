@extends('admin.master')


@section('pageMetaTitle')
    {{ $module -> title }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => $module -> title
	])


	<div class="p-2">
		@if(Session :: has('successDeleteStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session :: get('successDeleteStatus') }}
				</div>
			</div>
		@endif


		
		@php
			$i = 0;
		@endphp

		@foreach($collection as $dataFromDb)
			<!-- Add button -->
				@if(!$moduleStep->values()->get($i)->images)
					@include('admin.includes.addButton', [
						'text' => __('bsw.add').' '.$moduleStep->values()->get($i)->title,
						'url' => route('coreAddStep0', $module -> alias)
					])
				@else 
					{{ Form :: open(array('route' => array('coreAddMultImageForstep0', $module -> alias, $moduleStep->values()->get($i)->id), 'files' => true, 'method' => 'post')) }}
						{{ Form :: file('images[]', ['multiple' => "multiple", 'class' => "form-control", 'accept' => "image/*"]) }}
						{{ Form :: submit() }}
					{{ Form :: close() }}
				@endif
			<!--  -->


			@foreach($dataFromDb as $data)
				@include('admin.includes.horizontalEditDeleteBlock', [
						'id' => $data -> id,
						'title' => $data -> {$collectionForTags->values()->get($i)},
						'editLink' => route('coreEditStep0', array($module -> alias, $data -> id)),
						'deleteLink' => route('coreDeleteStep0', array($module -> alias, $data -> id))
					])
			@endforeach

			@php
				$i++;
			@endphp
		@endforeach



{{--
		@if(!$moduleStep -> images)
			@include('admin.includes.addButton', [
				'text' => __('bsw.add').' '.$moduleStep -> title,
				'url' => route('coreAddStep0', $module -> alias)
			])
		@else 
			{{ Form :: open(array('route' => array('coreAddMultImageForstep0', $module -> alias, $moduleStep -> id), 'files' => true, 'method' => 'post')) }}
				{{ Form :: file('images[]', ['multiple' => "multiple", 'class' => "form-control", 'accept' => "image/*"]) }}
				{{ Form :: submit() }}
			{{ Form :: close() }}
		@endif


		<div class="row" id="rangBlocks" data-db_table="{{ $moduleStep -> db_table }}">
			@if(!$moduleStep -> images)
				@foreach($moduleStepData as $data)
					@if($sortBy === 'rang')
						@include('admin.includes.horizontalEditDeleteBlock', [
							'id' => $data -> id,
							'title' => $data -> $use_for_tags,
							'editLink' => route('coreEditStep0', array($module -> alias, $data -> id)),
							'deleteLink' => route('coreDeleteStep0', array($module -> alias, $data -> id))
						])
					@else 
						@include('admin.includes.horizontalEditDelete', [
								'id' => $data -> id,
								'title' => $data -> $use_for_tags,
								'editLink' => route('coreEditStep0', array($module -> alias, $data -> id)),
								'deleteLink' => route('coreDeleteStep0', array($module -> alias, $data -> id))
						])
					@endif
				@endforeach
			@else
				@foreach($moduleStepData as $data)
					@if($sortBy === 'rang')
						@include('admin.includes.verticalEditDeleteBlockWithRangs', [
										'id' => $data -> id,
										'title' => $data -> $use_for_tags,
										'imageUrl' => 'storage/images/modules/'.$module -> alias.'/step_0/'.$data -> id.'.'.$imageFormat,
										'editLink' => route('coreEditStep0', array($module -> alias, $data -> id)),
										'deleteLink' => route('coreDeleteStep0', array($module -> alias, $data -> id))
									])
					@else
						@include('admin.includes.verticalEditDeleteBlock', [
										'id' => $data -> id,
										'title' => $data -> $use_for_tags,
										'imageUrl' => 'storage/images/modules/'.$module -> alias.'/step_0/'.$data -> id.'.'.$imageFormat,
										'moduleAlias' => $module -> alias,
										'editLink' => route('coreEditStep0', array($module -> alias, $data -> id)),
										'deleteLink' => route('coreDeleteStep0', array($module -> alias, $data -> id))
									])
					@endif
				@endforeach
			@endif
		</div>--}}
	</div>
@endsection
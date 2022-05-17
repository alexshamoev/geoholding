@extends('admin.master')


@section('pageMetaTitle')
    {{ $module->title }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => $module->title
	])
	
	
	<div class="p-2">
		@if(Session::has('successStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session::get('successStatus') }}
				</div>
			</div>
		@endif


		@if(Session::has('successDeleteStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session::get('successDeleteStatus') }}
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
						'url' => route('coreAdd', [$module->alias, $moduleStep->values()->get($i)->id])
					])
				@else 
					<div class="p-2">
						<div class="p-2 standard-block">
							{{ Form::open(array('route' => array('coreAddMultImage', $module->alias, $moduleStep->values()->get($i)->id, 0), 'files' => true, 'method' => 'post')) }}
								<div class="p-2">
									{{ __('bsw.add').' '.$moduleStep->values()->get($i)->title }}
								</div>

								<div class="p-2">
									{{ Form::file('images[]', ['multiple' => "multiple", 'class' => "form-control", 'accept' => "image/*"]) }}
								</div>

								<div class="p-2 submit-button">
									{{ Form::submit(__('bsw.adding')) }}
								</div>
							{{ Form::close() }}
						</div>
					</div>
				@endif
			<!--  -->
			<div class="row rangBlocks" data-db_table="{{ $moduleStep->values()->get($i)->db_table }}">
				@foreach($dataFromDb as $data)
					@if(!$moduleStep->values()->get($i)->images)
						@if($moduleStep->values()->get($i)->order_by_column === 'rang')
							@include('admin.includes.horizontalEditDeleteBlock', [
										'id' => $data->id,
										'title' => $data->{$collectionForTags->values()->get($i)},
										'editLink' => route('coreEdit', [$module->alias, $moduleStep->values()->get($i)->id, $data->id]),
										'deleteLink' => route('coreDelete', array($module->alias, $moduleStep->values()->get($i)->id, $data->id))
									])
						@else 
							@include('admin.includes.horizontalEditDelete', [
									'id' => $data->id,
									'title' => $data->{$collectionForTags->values()->get($i)},
									'editLink' => route('coreEdit', [$module->alias, $moduleStep->values()->get($i)->id, $data->id]),
									'deleteLink' => route('coreDelete', array($module->alias, $moduleStep->values()->get($i)->id, $data->id))
							])
						@endif
					@else
						@if($moduleStep->values()->get($i)->order_by_column === 'rang')
							@include('admin.includes.verticalEditDeleteBlockWithRangs', [
										'id' => $data->id,
										'title' => $data->{$collectionForTags->values()->get($i)},
										'imageUrl' => 'storage/images/modules/'.$module->alias.'/'.$moduleStep->values()->get($i)->id.'/'.$data->id.'.'.$imageFormat,
										'editLink' => route('coreEdit', array($module->alias, $moduleStep->values()->get($i)->id, $data->id)),
										'deleteLink' => route('coreDelete', array($module->alias, $moduleStep->values()->get($i)->id, $data->id))
									])
						@else 
							@include('admin.includes.verticalEditDeleteBlock', [
										'id' => $data->id,
										'title' => $data->{$collectionForTags->values()->get($i)},
										'imageUrl' => 'storage/images/modules/'.$module->alias.'/'.$moduleStep->values()->get($i)->id.'/'.$data->id.'.'.$imageFormat,
										'moduleAlias' => $module->alias,
										'editLink' => route('coreEdit', array($module->alias, $moduleStep->values()->get($i)->id, $data->id)),
										'deleteLink' => route('coreDelete', array($module->alias, $moduleStep->values()->get($i)->id, $data->id))
								])
						@endif
					@endif
				@endforeach
			</div>

			@php
				$i++;
			@endphp
		@endforeach



{{--
		@if(!$moduleStep->images)
			@include('admin.includes.addButton', [
				'text' => __('bsw.add').' '.$moduleStep->title,
				'url' => route('coreAdd', $module->alias)
			])
		@else 
			{{ Form::open(array('route' => array('coreAddMultImage', $module->alias, $moduleStep->id), 'files' => true, 'method' => 'post')) }}
				{{ Form::file('images[]', ['multiple' => "multiple", 'class' => "form-control", 'accept' => "image/*"]) }}
				{{ Form::submit() }}
			{{ Form::close() }}
		@endif


		<div class="row" id="rangBlocks" data-db_table="{{ $moduleStep->db_table }}">
			@if(!$moduleStep->images)
				@foreach($moduleStepData as $data)
					@if($sortBy === 'rang')
						@include('admin.includes.horizontalEditDeleteBlock', [
							'id' => $data->id,
							'title' => $data->$use_for_tags,
							'editLink' => route('coreEdit', array($module->alias, $data->id)),
							'deleteLink' => route('coreDelete', array($module->alias, $moduleStep->id, $data->id))
						])
					@else 
						@include('admin.includes.horizontalEditDelete', [
								'id' => $data->id,
								'title' => $data->$use_for_tags,
								'editLink' => route('coreEdit', array($module->alias, $data->id)),
								'deleteLink' => route('coreDelete', array($module->alias, $moduleStep->id, $data->id))
						])
					@endif
				@endforeach
			@else
				@foreach($moduleStepData as $data)
					@if($sortBy === 'rang')
						@include('admin.includes.verticalEditDeleteBlockWithRangs', [
										'id' => $data->id,
										'title' => $data->$use_for_tags,
										'imageUrl' => 'storage/images/modules/'.$module->alias.'/step_0/'.$data->id.'.'.$imageFormat,
										'editLink' => route('coreEdit', array($module->alias, $data->id)),
										'deleteLink' => route('coreDelete', array($module->alias, $moduleStep->id, $data->id))
									])
					@else
						@include('admin.includes.verticalEditDeleteBlock', [
										'id' => $data->id,
										'title' => $data->$use_for_tags,
										'imageUrl' => 'storage/images/modules/'.$module->alias.'/step_0/'.$data->id.'.'.$imageFormat,
										'moduleAlias' => $module->alias,
										'editLink' => route('coreEdit', array($module->alias, $data->id)),
										'deleteLink' => route('coreDelete', array($module->alias, $moduleStep->id, $data->id))
									])
					@endif
				@endforeach
			@endif
		</div>--}}
	</div>
@endsection
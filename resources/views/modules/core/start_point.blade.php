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

		@error('images')
			<div class="alert alert-danger">
				{{ __('bsw.fileValidation') }}
			</div>
		@enderror

		
		@php
			$i = 0;
		@endphp
		
		@foreach($collection as $dataFromDb)
			<!-- Add button -->
				@if(!$moduleStep->values()->get($i)->images && $moduleStep->values()->get($i)->possibility_to_add !== 0)
					@include('admin.includes.addButton', [
						'text' => __('bsw.add').' '.$moduleStep->values()->get($i)->title,
						'url' => route('coreAdd', [
							$module->alias,
							$moduleStep->values()->get($i)->id,
							0,
						])
					])
				@elseif($moduleStep->values()->get($i)->images) 
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
										'deleteLink' => route('coreDelete', array($module->alias, $moduleStep->values()->get($i)->id, $data->id)),
										'possibilityToDelete' => $moduleStep->values()->get($i)->possibility_to_delete,
									])
						@else 
							@include('admin.includes.horizontalEditDelete', [
									'id' => $data->id,
									'title' => $data->{$collectionForTags->values()->get($i)},
									'editLink' => route('coreEdit', [$module->alias, $moduleStep->values()->get($i)->id, $data->id]),
									'deleteLink' => route('coreDelete', array($module->alias, $moduleStep->values()->get($i)->id, $data->id)),
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

			<div class="my-5"></div>

			@php
				$i++;
			@endphp
		@endforeach
	</div>
@endsection
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


		@if(Session::has('alert'))
			<div class="p-2">
				<div class="alert alert-danger m-0" role="alert">
					{{ Session::get('alert') }}
				</div>
			</div>
		@endif


		@php
			$i = 0;
		@endphp

		@if($moduleStep->values()->get($i)->blocks_max_number === 0 || $moduleStep->values()->get($i)->blocks_max_number > count($collection->values()->get(0)))
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
				@elseif($moduleStep->values()->get($i)->images && $moduleStep->values()->get($i)->possibility_to_add !== 0)
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
		@endif

		{{ Form :: open(array('route' => array('coreMultiDelete', $module->alias, $moduleStep->values()->get($i)->id, 0, 0))) }}
			@foreach($collection as $dataFromDb)
				<div class="row rangBlocks" data-db_table="{{ $moduleStep->values()->get($i)->db_table }}">
					@foreach($dataFromDb as $data)
						@if(!$moduleStep->values()->get($i)->images)
							@include('admin.includes.infoBlockWithoutImage', [
										'id' => $data->id,
										'title' => $data->{$collectionForTags->values()->get($i)},
										'editLink' => route('coreEdit', [$module->alias, $moduleStep->values()->get($i)->id, $data->id]),
										'deleteLink' => route('coreDelete', array($module->alias, $moduleStep->values()->get($i)->id, $data->id)),
										'possibilityToDelete' => $moduleStep->values()->get($i)->possibility_to_delete,
										'possibilityToRang' => $moduleStep->values()->get($i)->possibility_to_rang,
										'possibilityToEdit' => $moduleStep->values()->get($i)->possibility_to_edit,
										'possibilityToMultyDelete' => $moduleStep->values()->get($i)->possibility_to_multy_delete,
									])
						@else
							@include('admin.includes.infoBlockWithImage', [
										'id' => $data->id,
										'title' => $data->{$collectionForTags->values()->get($i)},
										'imageUrl' => 'storage/images/modules/'.$module->alias.'/'.$moduleStep->values()->get($i)->id.'/'.$data->id.'.'.$imageFormat,
										'editLink' => route('coreEdit', array($module->alias, $moduleStep->values()->get($i)->id, $data->id)),
										'deleteLink' => route('coreDelete', array($module->alias, $moduleStep->values()->get($i)->id, $data->id)),
										'possibilityToDelete' => $moduleStep->values()->get($i)->possibility_to_delete,
										'possibilityToRang' => $moduleStep->values()->get($i)->possibility_to_rang,
										'possibilityToEdit' => $moduleStep->values()->get($i)->possibility_to_edit,
										'possibilityToMultyDelete' => $moduleStep->values()->get($i)->possibility_to_multy_delete,
									])
						@endif
					@endforeach

					@if($moduleStep->values()->get($i)->possibility_to_multy_delete !== 0 && count($dataFromDb) !== 0)
                        <div class="col-12">
                            <div class="col_padding check__remove_block p-2">
                                <span class="check_arrow">↑</span>

                                <span class="check_all me-2">{{ __('bsw.check_all') }}</span>
                                /
                                <span class="remove_check ms-2">{{ __('bsw.check_all') }}</span>
                            </div>
                        </div>

						<div class="p-2 delete-button">
							{{ Form::submit(__('bsw.delete_button_text')) }}
						</div>
					@endif
				</div>

				<div class="my-5"></div>

				@php
					$i++;
				@endphp
			@endforeach
		{{ Form :: close() }}
	</div>
@endsection

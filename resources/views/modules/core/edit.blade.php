@extends('admin.master')


@section('pageMetaTitle')
    {{ $module->title }} > {{ $data->{ $moduleStep->main_column } }}
@endsection


@section('content')
	@include('admin.includes.coreTags', [
		'tagsData' => $tagsData
	])

	@php
		$barData = [
					'nextId' => $nextId,
					'prevId' => $prevId,
					'nextRoute' => route('coreEdit', [$module->alias, $moduleStep->id, $nextId]),
					'prevRoute' => route('coreEdit', [$module->alias, $moduleStep->id, $prevId]),
					'backRoute' => $backRoute
				]
	@endphp

	@if($moduleStep->possibility_to_add === 1)
		@if($moduleStep->blocks_max_number === 0 || $moduleStep->blocks_max_number > count($allModuleData))
			@php
				$barData['addUrl'] = route('coreAdd', [$module->alias, $moduleStep->id, $parentDataId]);
			@endphp
		@endif
	@endif

	@if($moduleStep->possibility_to_delete === 1)
		@php
			$barData['deleteUrl'] = route('coreDelete', [$module->alias, $moduleStep->id, $data->id]);
		@endphp
	@endif

	@include('admin.includes.bar', $barData)


	<div class="p-2">
		@error('images')
			<div class="alert alert-danger">
				{{ __('bsw.fileValidation') }}
			</div>
		@elseif($errors->any())
			<div class="p-2">
				<div class="alert alert-danger m-0">
					{{ __('bsw.warningStatus') }}
				</div>
			</div>
		@enderror

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


		@if(Session::has('alert'))
			<div class="p-2">
				<div class="alert alert-danger m-0" role="alert">
					{{ Session::get('alert') }}
				</div>
			</div>
		@endif


		{{ Form::open(array('route' => array('coreUpdate', $module->alias, $moduleStep->id, $data->id), 'files' => true)) }}
			@foreach($moduleBlocks as $moduleBlock)
				@if($moduleBlock->db_column !== 'rang')
					<div class="p-2" id="{{ $moduleBlock->parent_div_id }}">
						@switch($moduleBlock->type)
							@case('input')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::text($moduleBlock->db_column, $data->{ $moduleBlock->db_column }) }}
									</div>
								</div>

								@break
							@case('image')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}

											$prefix = '';

											if($moduleBlock->prefix) {
												$prefix = $moduleBlock->prefix.'_';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::file($moduleBlock->db_column) }}
									</div>

									@if(file_exists(storage_path('app/public/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$data->id.'.'.$moduleBlock->file_format)))
										<div class="row p-1">
											<div class="col-3 p-1">
												<img src="{{ asset('/storage/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$data->id.'.'.$moduleBlock->file_format) }}"
													 class="w-100">
											</div>

											@if($moduleBlock->file_possibility_to_delete)
												<div class="col-3 p-1">
													<div class="js_delete_file_button delete_file_button"
														 data-delete-url="{{ route('deleteFile', [$module->alias, $moduleStep->id, $data->id, $moduleBlock->id]) }}">
														<img src="{{ asset('storage/images/admin/close.svg') }}"
																alt="__('bsw.delete_file')"
																class="bar-tag-bigger-img">
													</div>
												</div>
											@endif
										</div>
									@endif
								</div>

								@break
							@case('file')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}: <br>
										<div class="d-flex align-items-center">
											{!! __('bsw.show_format', ['format' => $moduleBlock->file_format]) !!}
										</div>
										@php
											if($moduleBlock->validation) {
												echo '*';
											}

											$prefix = '';

											if($moduleBlock->prefix) {
												$prefix = $moduleBlock->prefix.'_';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::file($moduleBlock->db_column) }}
									</div>

									@php
										$existingFileFormat = 'file';

										foreach(explode(',', $moduleBlock->file_format) as $formatData) {
											if(file_exists(public_path('/storage/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$data->id.'.'.$formatData))) {
												$existingFileFormat = $formatData;
											}
										}
									@endphp


									@if(file_exists(public_path('/storage/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$data->id.'.'.$existingFileFormat)))
										@if($existingFileFormat == 'svg')
											<div class="row p-1">
												<div class="col-3 p-1">
													<img src="{{ asset('/storage/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$data->id.'.'.$existingFileFormat) }}">
												</div>

												@if($moduleBlock->file_possibility_to_delete)
													<div class="col-3 p-1">
														<div class="js_delete_file_button delete_file_button"
															data-delete-url="{{ route('deleteFile', [$module->alias, $moduleStep->id, $data->id, $moduleBlock->id]) }}">
															<img src="{{ asset('storage/images/admin/close.svg') }}"
																	alt="__('bsw.delete_file')"
																	class="bar-tag-bigger-img">
														</div>
													</div>
												@endif

												@if($moduleBlock->show_file_url === 1)
													<div class="p-2">
														{{ __('bsw.file_url') }}

														<span class="text-primary">
															{{ ('/storage/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$data->id.'.'.$existingFileFormat) }}
														</span>
													</div>
												@endif
											</div>
										@else
											<a href="{{ asset('/storage/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$data->id.'.'.$existingFileFormat) }}" target="blank">
												<span class="p-2">
													{{ __('bsw.view_file') }}
												</span>
											</a>
											
											@if($moduleBlock->file_possibility_to_delete)
												<span class="js_delete_file_button delete_file_button"
													 data-delete-url="{{ route('deleteFile', [$module->alias, $moduleStep->id, $data->id, $moduleBlock->id]) }}">
													<img src="{{ asset('storage/images/admin/close.svg') }}"
															alt="__('bsw.delete_file')"
															class="bar-tag-bigger-img">
												</span>
											@endif

											@if($moduleBlock->show_file_url === 1)
												<div class="p-2">
													{{ __('bsw.file_url') }}

													<span class="text-primary">
														{{ ('/storage/images/modules/'.$module->alias.'/'.$moduleStep->id.'/'.$prefix.$data->id.'.'.$existingFileFormat) }}
													</span>
												</div>
											@endif
										@endif
									@endif
								</div>

								@break
							@case('select')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::select($moduleBlock->db_column, $selectData[$moduleBlock->db_column], $data->{ $moduleBlock->db_column }, ['id' => $moduleBlock->div_id]) }}
									</div>
								</div>

								@break
							@case('select_with_optgroup')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::select($moduleBlock->db_column, $selectOptgroudData[$moduleBlock->db_column], $data->{ $moduleBlock->db_column }) }}
									</div>
								</div>

								@break
							@case('editor')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::textarea($moduleBlock->db_column,
															$data->{ $moduleBlock->db_column },
															[
																'id' => $moduleBlock->db_column
															]) }}
									</div>
								</div>

								<script>
									ClassicEditor
										.create( document.querySelector( '#{{ $moduleBlock->db_column }}' ) )
										.catch( error => {
											console.error( error );
										} );
								</script>

								@break
							@case('alias')
								@foreach($languages as $langData)
									<div class="p-2 standard-block">
										<div class="p-2">
											URL Alias:

											@php
												if($moduleBlock->validation) {
													echo '*';
												}
											@endphp

											<img src="{{ asset('/storage/images/modules/languages/'.$langData->id.'.svg') }}" width="30">
										</div>

										<div class="p-2">
											{{ Form::text($moduleBlock->db_column.'_'.$langData->title,  $data->{ $moduleBlock->db_column.'_'.$langData->title }) }}
										</div>
									</div>

									@error($moduleBlock->db_column.'_'.$langData->title)
										<div class="alert alert-danger m-0">
											{{ $message }}
										</div>
									@enderror
								@endforeach

								@break
							@case('input_with_languages')
								@foreach($languages as $langData)
									<div class="p-2 standard-block">
										<div class="p-2">
											{{ $moduleBlock->label }}:

											@php
												if($moduleBlock->validation) {
													echo '*';
												}
											@endphp

											<img src="{{ asset('/storage/images/modules/languages/'.$langData->id.'.svg') }}" width="30">
										</div>

										<div class="p-2">
											{{ Form::text($moduleBlock->db_column.'_'.$langData->title,  $data->{ $moduleBlock->db_column.'_'.$langData->title }) }}
										</div>
									</div>

									@error($moduleBlock->db_column.'_'.$langData->title)
										<div class="alert alert-danger">
											{{ $message }}
										</div>
									@enderror
								@endforeach

								@break
							@case('editor_with_languages')
								@foreach($languages as $langData)
									<div class="p-2 standard-block">
										<div class="p-2">
											{{ $moduleBlock->label }}:

											@php
												if($moduleBlock->validation) {
													echo '*';
												}
											@endphp

											<img src="{{ asset('/storage/images/modules/languages/'.$langData->id.'.svg') }}" width="30">
										</div>

										<div class="p-2">
											{{ Form::textarea($moduleBlock->db_column.'_'.$langData->title,
																$data->{ $moduleBlock->db_column.'_'.$langData->title },
																[
																	'id' => $moduleBlock->db_column.'_'.$langData->title
																]) }}
										</div>
									</div>

									@error($moduleBlock->db_column.'_'.$langData->title)
										<div class="alert alert-danger m-0">
											{{ $message }}
										</div>
									@enderror

									<script>
										ClassicEditor
											.create( document.querySelector( '#{{ $moduleBlock->db_column.'_'.$langData->title }}' ),{
												link: {
													defaultProtocol: 'http://',
													decorators: {
														openInNewTab: {
															mode: 'manual',
															label: 'Open in a new tab',
															attributes: {
																target: '_blank',
																rel: 'noopener noreferrer'
															}
														}
													}
												}
											} )
											.catch( error => {
												console.error( error );
											} );
									</script>
								@endforeach

								@break
							@case('checkbox')
								<div class="p-2 standard-block">
									<div class="p-2">
										<label>
											{{ Form::checkbox($moduleBlock->db_column, 1, $data->{ $moduleBlock->db_column }) }}

											{{ $moduleBlock->label }}
										</label>
									</div>
								</div>

								@break
							@case('multiply_checkboxes')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:
									</div>

									<div class="p-2">
										@foreach($multiplyCheckbox[$moduleBlock->db_column] as $key => $dataInside)
											{{ Form::checkbox($moduleBlock->db_column.'[]', $key , $dataInside['active']) }}

											{{ $dataInside['title'] }}
										@endforeach
									</div>
								</div>

								@break
							@case('multiply_checkboxes_with_category')
								<div class="p-2 standard-block">
									<div class="p-2">
										@foreach($multiplyCheckboxCategory[$moduleBlock->db_column] as $key => $dataInside)
											{{ $key }}
											<br>
											@foreach($dataInside as $secondKey => $dataInsideTwice)
												{{ Form::checkbox($moduleBlock->db_column.'[]', $secondKey, $dataInsideTwice['active']) }}

												{{ $dataInsideTwice['title'] }}
												<br>
											@endforeach
										@endforeach
									</div>
								</div>

								@break
							@default
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock->label }}:

										@php
											if($moduleBlock->validation) {
												echo '*';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form::text($moduleBlock->db_column, $data->{ $moduleBlock->db_column }) }}
									</div>
								</div>
						@endswitch


						@if($moduleBlock->type !== 'alias' && $moduleBlock->type !== 'input_with_languages' && $moduleBlock->type !== 'editor_with_languages')
							@error($moduleBlock->db_column)
								<div class="alert alert-danger m-0">
									{{ $message }}
								</div>
							@enderror
						@endif
					</div>
				@endif
			@endforeach

			<div class="p-2 submit-button">
				{{ Form::submit(__('bsw.submit')) }}
			</div>
		{{ Form::close() }}

		<div class="my-5"></div>

		@php
			$i = 0;
		@endphp

		@if(!$nextModuleStep->isEmpty())
			@if($nextModuleStep->values()->get($i)->blocks_max_number === 0 || $nextModuleStep->values()->get($i)->blocks_max_number > count($nextModuleStepData[0]))
				<!-- Add button -->
					@if(!$nextModuleStep->values()->get($i)->images && $nextModuleStep->values()->get($i)->possibility_to_add !== 0)
						@include('admin.includes.addButton', [
							'text' => __('bsw.add').' '.$nextModuleStep->values()->get($i)->title,
							'url' => route('coreAdd', [$module->alias, $nextModuleStep->values()->get($i)->id, $data->id])
						])
					@elseif($nextModuleStep->values()->get($i)->images && $nextModuleStep->values()->get($i)->possibility_to_add !== 0)
						<div class="p-2">
							<div class="p-2 standard-block">
								{{ Form::open(array('route' => array('coreAddMultImage', $module->alias, $nextModuleStep->values()->get($i)->id, $data->id), 'files' => true, 'method' => 'post')) }}
									<div class="p-2">
										{{ __('bsw.add').' '.$nextModuleStep->values()->get($i)->title }}
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

			{{ Form :: open(array('route' => array('coreMultiDelete', $module->alias, $nextModuleStep->values()->get($i)->id, $data->id, $moduleStep->id))) }}
				@foreach($nextModuleStep as $moduleStepData)
					<div class="row rangBlocks" data-db_table="{{ $moduleStepData->db_table }}">
						@foreach($nextModuleStepData->values()->get($i) as $dataIn)
							@if(!$moduleStepData->images)
								@include('admin.includes.infoBlockWithoutImage',
										[
											'id' => $dataIn->id,
											'title' => $dataIn->{ $moduleStepData->main_column },
											'editLink' => route('coreEdit', [$module->alias, $moduleStepData->id, $dataIn->id]),
											'deleteLink' => route('coreDelete', array($module->alias, $moduleStepData->id, $dataIn->id)),
											'possibilityToDelete' => $moduleStepData->possibility_to_delete,
											'possibilityToRang' => $moduleStepData->possibility_to_rang,
											'possibilityToEdit' => $moduleStepData->possibility_to_edit,
											'possibilityToMultyDelete' => $moduleStepData->possibility_to_multy_delete,
										])
							@else
								@include('admin.includes.infoBlockWithImage', [
									'id' => $dataIn->id,
									'title' => $dataIn->{ $moduleStepData->main_column },
									'imageUrl' => 'storage/images/modules/'.$module->alias.'/'.$moduleStepData->id.'/'.$dataIn->id.'.'.$imageFormat,
									'editLink' => route('coreEdit', [$module->alias, $moduleStepData->id, $dataIn->id]),
									'deleteLink' => route('coreDelete', array($module->alias, $moduleStepData->id, $dataIn->id)),
									'possibilityToDelete' => $moduleStepData->possibility_to_delete,
									'possibilityToRang' => $moduleStepData->possibility_to_rang,
									'possibilityToEdit' => $moduleStepData->possibility_to_edit,
									'possibilityToMultyDelete' => $moduleStepData->possibility_to_multy_delete,
								])
							@endif
						@endforeach

                        @if($moduleStepData->possibility_to_multy_delete !== 0 && count($nextModuleStepData->values()->get($i)) !== 0)
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
		@endif
	</div>


	<div class="d-none js_bsws"
		 data-delete_file_title="{{ __('bsw.sure_want_delete_file') }}"
		 data-delete="{{ __('bsw.delete') }}"
		 data-cancel="{{ __('bsw.cancel') }}"></div>
@endsection

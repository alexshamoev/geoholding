@extends('admin.master')


@section('pageMetaTitle')
    {{ $module -> title }} > {{ $parentData -> title_ge }} > {{ $parentDataSecond -> title_ge }} > {{ $parentDataThird -> title_ge }} > {{ $data -> title_ge }}
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => $module -> title,
		'tag0Url' => route('coreGetStep0', $module -> alias),
		'tag1Text' => $parentData -> title_ge,
		'tag1Url' => route('coreEditStep0', [$module -> alias, $parentFirst]),
		'tag2Text' => $parentDataSecond -> title_ge,
        'tag2Url' => route('coreEditStep1', [$module -> alias, $parentFirst, $parentSecond]),
        'tag3Text' => $parentDataThird -> title_ge,
        'tag3Url' => route('coreEditStep2', [$module -> alias, $parentFirst, $parentSecond, $parentThird]),
        'tag4Text' => $data -> title_ge
	])

	@include('admin.includes.bar', [
		'addUrl' => route('coreAddStep3', [$module -> alias, $parentFirst, $parentSecond, $parentThird, $id]),
		'deleteUrl' => route('coreDeleteStep3', array($module -> alias, $parentFirst, $parentSecond, $parentThird, $data -> id)),
		'nextId' => $nextId,
		'prevId' => $prevId,
		'nextRoute' => route('coreEditStep3', [$module -> alias, $parentFirst, $parentSecond, $parentThird, $nextId]),
		'prevRoute' => route('coreEditStep3', [$module -> alias, $parentFirst, $parentSecond, $parentThird, $prevId]),
		'backRoute' => route('coreEditStep2', [$module -> alias, $parentFirst, $parentSecond, $parentThird])
	])


    <div class="p-2">
		@if($errors -> any())
			<div class="p-2">
				<div class="alert alert-danger m-0">
					Whoops, looks like something went wrong
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
		

		{{ Form :: open(array('route' => array('coreUpdateStep3', $module -> alias, $parentFirst, $parentSecond, $parentThird, $id), 'files' => true)) }}
			@foreach($moduleBlocks as $moduleBlock)
				@if($moduleBlock -> db_column !== 'published' && $moduleBlock -> db_column !== 'rang')
					<div class="p-2">
						@switch($moduleBlock -> type)
							@case('alias')
								@foreach($languages as $langData)
									<div class="p-2 standard-block">
										<div class="p-2">
											URL Alias:

											@php
												if($moduleBlock -> validation) {
													echo '*';
												}
											@endphp

											<img src="{{ asset('/storage/images/modules/languages/'.$langData -> id.'.svg') }}" width="30">
										</div>

										<div class="p-2">
											{{ Form :: text($moduleBlock -> db_column.'_'.$langData -> title,  $data -> { $moduleBlock -> db_column.'_'.$langData -> title }) }}
										</div>
									</div>

									@error($moduleBlock -> db_column.'_'.$langData -> title)
										<div class="alert alert-danger">
											{{ $message }}
										</div>
									@enderror
								@endforeach

								@break
							@case('input')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										{{ Form :: text($moduleBlock -> db_column, $data -> { $moduleBlock -> db_column }) }}
									</div>
								</div>

								@break
							@case('select')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										{{ Form :: select($moduleBlock -> db_column, $selectData[$moduleBlock -> db_column], $data -> { $moduleBlock -> db_column }) }}
									</div>
								</div>

								@break
							@case('select_with_optgroup')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										{{ Form :: select($moduleBlock -> db_column, $selectOptgroudData[$moduleBlock -> db_column]) }}
									</div>
								</div>
								
								@break

							@case('editor')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										{{ Form :: textarea($moduleBlock -> db_column,
															$data -> { $moduleBlock -> db_column },
															[
																'id' => $moduleBlock -> db_column
															]) }}
									</div>
								</div>

								<script>
									ClassicEditor
										.create( document.querySelector( '#{{ $moduleBlock -> db_column }}' ) )
										.catch( error => {
											console.error( error );
										} );					
								</script>

								@break
							@case('input_with_languages')
								@foreach($languages as $langData)
									<div class="p-2 standard-block">
										<div class="p-2">
											{{ $moduleBlock -> label }}:

											@php
												if($moduleBlock -> validation) {
													echo '*';
												}
											@endphp

											<img src="{{ asset('/storage/images/modules/languages/'.$langData -> id.'.svg') }}" width="30">
										</div>

										<div class="p-2">
											{{ Form :: text($moduleBlock -> db_column.'_'.$langData -> title,  $data -> { $moduleBlock -> db_column.'_'.$langData -> title }) }}
										</div>
									</div>

									@error($moduleBlock -> db_column.'_'.$langData -> title)
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
											{{ $moduleBlock -> label }}:

											@php
												if($moduleBlock -> validation) {
													echo '*';
												}
											@endphp

											<img src="{{ asset('/storage/images/modules/languages/'.$langData -> id.'.svg') }}" width="30">
										</div>

										<div class="p-2">
											{{ Form :: textarea($moduleBlock -> db_column.'_'.$langData -> title, 
																$data -> { $moduleBlock -> db_column.'_'.$langData -> title },
																[
																	'id' => $moduleBlock -> db_column.'_'.$langData -> title
																]) }}
										</div>
									</div>

									@error($moduleBlock -> db_column.'_'.$langData -> title)
										<div class="alert alert-danger">
											{{ $message }}
										</div>
									@enderror

									<script>
										ClassicEditor
											.create( document.querySelector( '#{{$moduleBlock -> db_column.'_'.$langData -> title}}' ) )
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
											{{ Form :: checkbox($moduleBlock -> db_column, 1, $data -> { $moduleBlock -> db_column }) }}
											
											{{ $moduleBlock -> label }}
										<label>
									</div>
								</div>

								@break
							@case('image')
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}

										@php
											if($moduleBlock -> validation) {
												echo '*';
											}

											$prefix = '';

											if($moduleBlock -> prefix) {
												$prefix = $moduleBlock -> prefix.'_';
											}
										@endphp
									</div>

									<div class="p-2">
										{{ Form :: file($moduleBlock -> db_column) }}
									</div>
									
									@if(file_exists(public_path('/storage/images/modules/'.$module -> alias.'/step_3/'.$prefix.$data -> id.'.'.$moduleBlock -> file_format)))
										<div class="p-2">
											<img class="w-25" src="{{ asset('/storage/images/modules/'.$module -> alias.'/step_3/'.$prefix.$data -> id.'.'.$moduleBlock -> file_format) }}" alt="">
										</div>
									@endif
								</div>

								@break
							@default
								<div class="p-2 standard-block">
									<div class="p-2">
										{{ $moduleBlock -> label }}
									</div>

									<div class="p-2">
										{{ Form :: text($moduleBlock -> db_column, $data -> { $moduleBlock -> db_column }) }}
									</div>
								</div>
						@endswitch

						@if($moduleBlock -> type !== 'alias' && $moduleBlock -> type !== 'input_with_languages' && $moduleBlock -> type !== 'editor_with_languages')
							@error($moduleBlock -> db_column)
								<div class="alert alert-danger">
									{{ $message }}
								</div>
							@enderror	
						@endif
					</div>
				@endif
			@endforeach

			<div class="p-2 submit-button">
				{{ Form :: submit(__('bsw.submit')) }}
			</div>
		{{ Form :: close() }}
    </div>
@endsection
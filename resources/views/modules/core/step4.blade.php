@extends('admin.master')


@section('pageMetaTitle')
    Modules
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

											<img src="{{ asset('/storage/images/modules/languages/'.$langData -> id.'.svg') }}" width="30" height="30">
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
										{{ Form :: textarea($moduleBlock -> db_column, $data -> { $moduleBlock -> db_column }) }}
									</div>
								</div>

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

											<img src="{{ asset('/storage/images/modules/languages/'.$langData -> id.'.svg') }}" width="30" height="30">
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

											<img src="{{ asset('/storage/images/modules/languages/'.$langData -> id.'.svg') }}" width="30" height="30">
										</div>

										<div class="p-2">
											{{ Form :: textarea($moduleBlock -> db_column.'_'.$langData -> title,  $data -> { $moduleBlock -> db_column.'_'.$langData -> title }) }}
										</div>
									</div>

									@error($moduleBlock -> db_column.'_'.$langData -> title)
										<div class="alert alert-danger">
											{{ $message }}
										</div>
									@enderror

									<script>
										CKEDITOR.replace('{{ $moduleBlock -> db_column.'_'.$langData -> title }}');
									</script>
								@endforeach

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
										{{ Form :: file('image') }}
									</div>
									
									<img class="w-25" src="{{ asset('/storage/images/modules/'.$module -> alias.'/step_3/'.$prefix.$data -> id.'.'.$moduleBlock -> file_format) }}" alt="">
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
					</div>
				@endif
			@endforeach

			<div class="p-2 submit-button">
				{{ Form :: submit('Submit') }}
			</div>
		{{ Form :: close() }}
    </div>

@endsection
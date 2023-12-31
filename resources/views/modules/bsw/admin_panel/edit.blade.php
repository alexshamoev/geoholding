@extends('admin.master')


@section('pageMetaTitle')
    BSW > {{ $activeBsw->system_word }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'BSW',
		'tag0Url' => route('bsw.index'),
		'tag1Text' => $activeBsw->system_word
	])


	@include('admin.includes.bar', [
		'addUrl' => route('bsw.create'),
		'deleteUrl' => route('bsw.destroy', $activeBsw->id),
		'nextId' => $nextBswId,
		'prevId' => $prevBswId,
		'nextRoute' => route('bsw.edit', $nextBswId),
		'prevRoute' => route('bsw.edit', $prevBswId),
		'backRoute' => route('bsw.index')
	])


	<div class="p-2">
		@if($errors->any())
			<div class="p-2">
				<div class="alert alert-danger m-0">
					{{ __('bsw.warningStatus') }}
				</div>
			</div>
		@endif
		
		
		@if(Session::has('successStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session::get('successStatus') }}
				</div>
			</div>
		@endif


		{{ Form::model($activeBsw, array('route' => array('bsw.update', $activeBsw->id))) }}
			@method('PUT')

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						System word: *
					</div>
					
					<div class="p-2">
						{{ Form::text('system_word') }}
					</div>
				</div>

				@error('system_word')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>		

			<div class="p-2">
				@foreach($languages as $langData)
					<div class="standard-block standard-block--no-top-border p-2">
						<div class="p-2">
							Description:
							
							<img src="{{ asset('/storage/images/modules/languages/'.$langData->id.'.svg') }}" width="30" height="30">
						</div>			

						<div class="p-2">
							{{ Form::text('word_'.$langData->title) }}
						</div>
					</div>
				@endforeach
			</div>

			<div class="p-2">
				<div class="submit-button">
					{{ Form::submit('Submit') }}
				</div>
			</div>
		{{ Form::close() }}
	</div>
@endsection
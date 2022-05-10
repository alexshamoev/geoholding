@extends('admin.master')


@section('pageMetaTitle')
    Modules > {{ $module->alias }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'Modules',
		'tag0Url' => route('moduleStartPoint'),
		'tag1Text' => $module->alias
	])


	@include('admin.includes.bar', [
		'addUrl' => route('moduleAdd'),
		'deleteUrl' => route('moduleDelete', $module->id),
		'nextId' => $nextModuleId,
		'prevId' => $prevModuleId,
		'nextRoute' => route('moduleEdit', $nextModuleId),
		'prevRoute' => route('moduleEdit', $prevModuleId),
		'backRoute' => route('moduleStartPoint')
	])
	

	<div class="p-2 modulesStep0">
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


		@if(Session::has('successDeleteStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session::get('successDeleteStatus') }}
				</div>
			</div>
		@endif

		
		{{ Form::model($module, array('route' => array('moduleUpdate', $module->id), 'class' => 'm-0', 'files' => 'true')) }}
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>Title: *</span>
						<span>(Example: photo_gallery)</span>
					</div>
					
					<div class="p-2">
						{{ Form::text('alias') }}
					</div>
				</div>

				@error('alias')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<span>Title: * </span>
					</div>
					
					<div class="p-2">
						{{ Form::text('title') }}
					</div>
				</div>

				@error('title')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="px-2 pt-2 row w-100">
				<div class="col p-0 standard-block standard-block--no-right-border standard-block--no-bottom-border d-flex align-items-center">
					<label class="w-100">
						<div class="d-flex flex-column align-items-center text-center p-2">
							<div class="p-1">
								{{ Form::radio('include_type', '0', null, array('class' => 'include_type')) }}
							</div>

							<div class="p-1">
								<span>Attach page (0)</span>
							</div>
						</div>
					</label>
				</div>

					
				<div class="col p-0 standard-block standard-block--no-right-border standard-block--no-bottom-border d-flex align-items-center">
					<label class="w-100">
						<div class="d-flex flex-column align-items-center text-center p-2">
							<div class="p-1">
								{{ Form::radio('include_type', '1', null, array('class' => 'include_type')) }}
							</div>

							<div class="p-1">
								<span>გამოვაჩინოთ ყველა გვერდზე (1)</span>
							</div>
						</div>
					</label>
				</div>

					
				<div class="col p-0 standard-block standard-block--no-right-border standard-block--no-bottom-border d-flex align-items-center">
					<label class="w-100">
						<div class="d-flex flex-column align-items-center text-center p-2">
							<div class="p-1">
								{{ Form::radio('include_type', '2', null, array('class' => 'include_type')) }}
							</div>

							<div class="p-1">
								<span>გამოვაჩინოთ გვერდებზე (2)</span>
							</div>
						</div>
					</label>
				</div>

					
				<div class="col p-0 standard-block standard-block--no-right-border standard-block--no-bottom-border d-flex align-items-center">
					<label class="w-100">
						<div class="d-flex flex-column align-items-center text-center p-2">
							<div class="p-1">
								{{ Form::radio('include_type', '3', null, array('class' => 'include_type')) }}
							</div>

							<div class="p-1">
								<span>გამოვაჩინოთ ყველა გვერდზე, გარდა (3)</span>
							</div>
						</div>
					</label>
				</div>

				<div class="col p-0 standard-block standard-block--no-bottom-border d-flex align-items-center">
					<label class="w-100">
						<div class="d-flex flex-column align-items-center text-center p-2">
							<div class="p-1">
								{{ Form::radio('include_type', '4', null, array('class' => 'include_type')) }}
							</div>

							<div class="p-1">
								<span>არ მივაბათ მოდული არცერთ გვერდს (4)</span>
							</div>
						</div>
					</label>
				</div>
			</div>
	

			<div class="px-2">
				<div class="d-flex flex-column standard-block">
					<div class="p-2 modulesStep0__typeBox modulesStep0__type0Box">
						{{ Form::select('page_id', $pagesForSelect, $module->page_id) }}
					</div>

					<div class="p-2 modulesStep0__typeBox modulesStep0__type2Box">
						@foreach($pagesForIncludeInPages as $key => $data)
							<div>
								<label>
									<input type="checkbox"
											value="{{ $key }}"
											name="page_include_{{ $key }}"
											{{ $data['checked'] }}>
											
									{{ $data['alias'] }} 
								</label>
							</div>
						@endforeach
					</div>


					<div class="p-2 modulesStep0__typeBox modulesStep0__type3Box">
						@foreach($pagesNotIncludeInPages as $key => $data)
							<div>
								<label>
									<input type="checkbox"
											value="{{ $key }}"
											name="page_not_include_{{ $key }}"
											{{ $data['checked'] }}>
											
									{{ $data['alias'] }} 
								</label>
							</div>
						@endforeach
					</div>
				
				</div>
			</div>

			<div class="px-2 pt-3 pb-2">
				<div class="standard-block p-2">
					<div class="row">
						<div class="col-5 p-2">
							<label>
								{{ Form::radio('hide_for_admin', '0') }}

								Show for admin?
							</label>
						</div>

						<div class="col-7 p-2">
							<label>
								{{ Form::radio('hide_for_admin', '1') }}

								Hide for admin?
							</label>
						</div>
					</div>
				</div>
			</div>


			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-1">
						<span>Color:</span>
					</div>

					<div class="p-1">
						{{ Form::input('color', 'icon_bg_color') }}
					</div>
				</div>

				@error('icon_bg_color')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>


			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-1">
						<span>SVG Icon:</span>
					</div>

					<div class="p-1">
						{{ Form::file('svg_icon') }}
					</div>
				</div>
			</div>

		
			<div class="p-2 submit-button">
				{{ Form::submit('Submit') }}
			</div>
		{{ Form::close() }}

		
		<div class="p-3"></div>

		@include('admin.includes.addButton', ['text' => 'Add Step', 'url' => route('moduleStepAdd', array($module->id))])

		<div id="rangBlocks" data-db_table="module_steps">
			@foreach($module->moduleStep as $data)
				@include('admin.includes.horizontalEditDeleteBlock', [
					'id' => $data->id,
					'title' => $data->db_table,
					'text' => $data->title,
					'editLink' => route('moduleStepEdit', array($module->id, $data->id)),
					'deleteLink' => route('moduleStepDelete', array($module->id, $data->id))
				])
			@endforeach
		</div>	
	</div>
@endsection
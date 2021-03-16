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


	{{ Form :: model($module, array('route' => array('moduleUpdate', $module -> id), 'class' => 'm-0', 'files' => 'true')) }}
		<div class="p-2">
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>Title: *</span>
						<span>(Example: photo_gallery)</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('alias') }}
					</div>
				</div>
			</div>

			@foreach($languages as $data)
				<div class="p-2">
					<div class="standard-block p-2">
						<div class="p-2">
							<span>Full title: * {{ $data -> title }}</span>
						</div>
						
						<div class="p-2">
							{{ Form :: text('title_'.$data -> title) }}
						</div>
					</div>
				</div>
			@endforeach

			<div class="px-2 pt-2 d-flex">
				<label>
					<div class="d-flex flex-column align-items-center text-center standard-block standard-block--no-right-border standard-block--no-bottom-border p-2 h-100">
						<div class="p-1">
							{{ Form :: radio('include_type', '0') }}
						</div>

						<div class="p-1">
							<span>Attach page</span>
						</div>
					</div>
				</label>

				
				<label>
					<div class="d-flex flex-column align-items-center text-center standard-block standard-block--no-right-border standard-block--no-bottom-border p-2 h-100">
						<div class="p-1">
							{{ Form :: radio('include_type', '1') }}
						</div>

						<div class="p-1">
							<span>გამოვაჩინოთ ყველა გვერდზე</span>
						</div>
					</div>
				</label>

				
				<label>
					<div class="d-flex flex-column align-items-center text-center standard-block standard-block--no-right-border standard-block--no-bottom-border p-2 h-100">
						<div class="p-1">
							{{ Form :: radio('include_type', '2') }}
						</div>

						<div class="p-1">
							<span>გამოვაჩინოთ გვერდებზე</span>
						</div>
					</div>
				</label>

				
				<label>
					<div class="d-flex flex-column align-items-center text-center standard-block standard-block--no-right-border standard-block--no-bottom-border p-2 h-100">
						<div class="p-1">
							{{ Form :: radio('include_type', '3') }}
						</div>

						<div class="p-1">
							<span>გამოვაჩინოთ ყველა გვერდზე, გარდა</span>
						</div>
					</div>
				</label>

				
				<label>
					<div class="d-flex flex-column align-items-center text-center standard-block standard-block--no-right-border standard-block--no-bottom-border p-2 h-100">
						<div class="p-1">
							{{ Form :: radio('include_type', '4') }}
						</div>

						<div class="p-1">
							<span>არ მივაბათ მოდული არცერთ გვერდს</span>
						</div>
					</div>
				</label>
			</div>
			

			<div class="px-2">
				<div class="d-flex flex-column standard-block p-2">
					<div class="p-1">
						<span>გვერდი</span>
					</div>
					
					<div class="p-1">
						{{ Form :: select('page', $pagesForSelect, $module -> page) }}
					</div>

					<div class="p-2">
						@foreach($pagesForIncludeInPages as $key => $data)
							<div>
								<label>
									<input type="checkbox"
											value="{{ $key }}"
											name="page_include_{{ $key }}">
									
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
						<div class="col-5">
							<label>
								{{ Form :: radio('hide_for_admin', '0') }}

								Show for admin?
							</label>
						</div>

						<div class="col-7">
							<label>
								{{ Form :: radio('hide_for_admin', '1') }}

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
						{{ Form :: input('color', 'icon_bg_color') }}
					</div>
				</div>
			</div>


			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-1">
						<span>SVG Icon:</span>
					</div>

					<div class="p-1">
						{{ Form :: file('svg_icon') }}
					</div>
				</div>
			</div>

		
			<div class="p-2 submit-button">
				{{ Form :: submit('Submit') }}
			</div>

		</div>
	{{ Form :: close() }}

	<div class="p-2">
		@include('admin.includes.addButton', ['text' => 'Step', 'url' => route('moduleStepAdd', $module -> id)])
	</div>

    <div class="p-2">
		@foreach($moduleSteps as $data)
			@include('admin.includes.horizontalEditDeleteBlock', [
				'title' => $data -> title,
				'editLink' => route('moduleStepEdit', array($module -> id, $data -> id)),
				'deleteLink' => route('moduleStepDelete', array($module -> id, $data -> id))
			])
		@endforeach
    </div>
@endsection

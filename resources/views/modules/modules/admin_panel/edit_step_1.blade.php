@extends('admin.master')


@section('pageMetaTitle')
    Modules > {{ $moduleStep -> parentModel -> alias }} > {{ $moduleStep -> title }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'Modules',
		'tag0Url' => route('moduleStartPoint'),
		'tag1Text' => $moduleStep -> parentModel -> alias,
		'tag1Url' => route('moduleEdit', $moduleStep -> parentModel -> id),
		'tag2Text' => $moduleStep -> title
	])


	@include('admin.includes.bar', [
		'addUrl' => route('moduleStepAdd', $moduleStep -> parentModel -> id),
		'deleteUrl' => route('moduleStepDelete', array($moduleStep -> parentModel -> id, $moduleStep -> id)),
		'nextId' => 5,
		'prevId' => 5,
		'nextRoute' => route('moduleStepEdit', array($moduleStep -> parentModel -> id, 4)),
		'prevRoute' => route('moduleStepEdit', array($moduleStep -> parentModel -> id, 4)),
		'backRoute' => route('moduleEdit', $moduleStep -> parentModel -> id)
	])

	
	@if(Session :: has('successStatus'))
        <div class="alert alert-success" role="alert">
            {{ Session :: get('successStatus') }}
        </div>
    @endif
	

	{{ Form :: model($moduleStep, array('route' => array('moduleStepUpdate', $moduleStep -> parentModel -> id, $moduleStep -> id))) }}
		<div class="p-2">
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>Title: *</span>
						<span>(Example: Category)</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('title') }}
					</div>
				</div>

				@error('title')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>Title: *</span>
						<span>(Example: news_step_0)</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('db_table') }}
					</div>
				</div>

				@error('db_table')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<label>
							{{ Form :: checkbox('images', '1') }}

							images?
						</label>
					</div>

					<div class="p-2">
						<label>
							{{ Form :: checkbox('possibility_to_add', '1') }}

							possibility_to_add?
						</label>
					</div>

					<div class="p-2">
						<label>
							{{ Form :: checkbox('possibility_to_delete', '1') }}

							possibility_to_delete?
						</label>
					</div>

					<div class="p-2">
						<label>
							{{ Form :: checkbox('possibility_to_rang', '1') }}

							possibility_to_rang?
						</label>
					</div>

					<div class="p-2">
						<label>
							{{ Form :: checkbox('possibility_to_edit', '1') }}

							possibility_to_edit?
						</label>
					</div>

					<div class="p-2">
						<label>
							{{ Form :: checkbox('use_existing_step', '1') }}

							use_existing_step?
						</label>
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block">
					<div class="col-4">
						<label class="w-100">
							<div class="d-flex flex-column p-2">
								<div class="py-1">
									<span>Blocks Max Number:</span>
								</div>

								<div class="py-1">
									<span>(e.g. 5)</span>
								</div>
								
								<div class="pt-1">
									<span class="text-danger">0 means infinite amount</span>
								</div>
							</div>

							<div class="p-2">
								{{ Form :: number('blocks_max_number', null,  ['class' => 'w-100']) }}
							</div>

						</label>
					</div>
				</div>
			</div>

			<div class="p-2 submit-button">
				{{ Form :: submit('Submit') }}
			</div>
		</div>
	{{ Form :: close() }}


	<div class="px-2">
		@include('admin.includes.addButton', ['text' => 'Add Block', 'url' => route('moduleBlockAdd', array($moduleStep -> parentModel -> id, $moduleStep -> id))])
	</div>


	<div class="px-2 pb-2">
		<div id="rangBlocks" data-db_table="module_blocks">
			@foreach($moduleStep -> moduleBlocks as $data)
				@include('admin.includes.horizontalEditDeleteBlock', [
					'id' => $data -> id,
					'title' => $data -> db_column,
					'text' => $data -> type,
					'text1' => $data -> label,
					'editLink' => route('moduleBlockEdit', array($moduleStep -> parentModel -> id, $moduleStep -> id, $data -> id)),
					'deleteLink' => route('moduleBlockDelete', array($moduleStep -> parentModel -> id, $moduleStep -> id, $data -> id))
				])
			@endforeach
		</div>
    </div>
@endsection

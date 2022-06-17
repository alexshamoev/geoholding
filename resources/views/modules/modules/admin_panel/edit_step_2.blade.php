@extends('admin.master')


@section('pageMetaTitle')
    Modules > {{ $moduleStep -> module -> alias}} > {{$moduleStep -> title }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'Modules',
		'tag0Url' => route('moduleStartPoint'),
		'tag1Text' => $moduleStep -> module -> alias,
		'tag1Url' => route('moduleEdit', $moduleStep -> module -> id),
		'tag3Text' => $moduleStep -> title
	])


	@include('admin.includes.bar', [
		'addUrl' => route('moduleStepAdd', [$moduleStep -> module -> id]),
		'deleteUrl' => route('moduleStepDelete', [$moduleStep -> module -> id, $moduleStep -> id]),
		'nextId' => $next,
		'prevId' => $prev,
		'nextRoute' => route('moduleStepEdit', [$moduleStep -> module -> id, $next]),
		'prevRoute' => route('moduleStepEdit', [$moduleStep -> module -> id, $prev]),
		'backRoute' => route('moduleEdit', [$moduleStep -> module -> id])
	])

	<div class="p-2">
		@if($errors -> any())
			<div class="p-2">
				<div class="alert alert-danger m-0">
					{{__('bsw.warningStatus')}}
				</div>
			</div>
		@endif
		
		
		@if(Session :: has('successStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{Session :: get('successStatus')}}
				</div>
			</div>
		@endif


		@if(Session :: has('successDeleteStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{Session :: get('successDeleteStatus')}}
				</div>
			</div>
		@endif


		{{Form :: model($moduleStep, array('route' => array('moduleStepUpdate', $moduleStep -> module -> id, $moduleStep -> id)))}}
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>parent_step_id:</span>
					</div>
					
					<div class="p-2">
						{{ Form::select('parent_step_id', $topLevelSelectValues) }}
					</div>
				</div>
			</div>
			
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>title: *</span>
						<span>(Example: Category)</span>
					</div>
					
					<div class="p-2">
						{{Form :: text('title')}}
					</div>
				</div>

				@error('title')
					<div class="alert alert-danger">
						{{$message}}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>db_table: *</span>
						<span>(Example: news_step_0)</span>
					</div>
					
					<div class="p-2">
						{{Form :: text('db_table')}}
					</div>
				</div>

				@error('db_table')
					<div class="alert alert-danger">
						{{$message}}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>model_name: *</span>
						<span>(Example: NewsStep0)</span>
					</div>
					
					<div class="p-2">
						{{Form :: text('model_name')}}
					</div>
				</div>

				@error('model_name')
					<div class="alert alert-danger">
						{{$message}}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>main_column: *</span>
						<span>(Example: title_ge)</span>
					</div>
					
					<div class="p-2">
						{{Form :: text('main_column')}}
					</div>
				</div>

				@error('main_column')
					<div class="alert alert-danger">
						{{$message}}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>order_by_column: *</span>
						<span>(Example: rang)</span>
					</div>
					
					<div class="p-2">
						{{Form :: text('order_by_column')}}
					</div>
				</div>

				@error('order_by_column')
					<div class="alert alert-danger">
						{{$message}}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>order_by_sequence: *</span>
						<span>(Example: DESC)</span>
					</div>
					
					<div class="p-2">
						DESC {{Form :: radio('order_by_sequence', 'DESC')}}
						ASC {{Form :: radio('order_by_sequence', 'ASC')}}
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<label>
							{{Form :: checkbox('images', '1')}}

							images?
						</label>
					</div>

					<div class="p-2">
						<label>
							{{Form :: checkbox('possibility_to_add', '1')}}

							possibility_to_add?
						</label>
					</div>

					<div class="p-2">
						<label>
							{{Form :: checkbox('possibility_to_delete', '1')}}

							possibility_to_delete?
						</label>
					</div>

					<div class="p-2">
						<label>
							{{Form :: checkbox('possibility_to_rang', '1')}}

							possibility_to_rang?
						</label>
					</div>

					<div class="p-2">
						<label>
							{{Form :: checkbox('possibility_to_edit', '1')}}

							possibility_to_edit?
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
								{{Form :: number('blocks_max_number', null,  ['class' => 'w-100'])}}
							</div>

						</label>
					</div>
				</div>
			</div>

			<div class="p-2 submit-button">
				{{Form :: submit('Submit')}}
			</div>
		{{Form :: close()}}
	</div>


	<div class="px-2">
		@include('admin.includes.addButton', ['text' => 'Add Block', 'url' => route('moduleBlockAdd', [$moduleStep -> module -> id, $moduleStep -> id])])
	</div>


	<div class="px-2 pb-2">
		<div class="rangBlocks" data-db_table="module_blocks">
			@foreach($moduleStep -> moduleBlock as $data)
				@include('admin.includes.infoBlockWithoutImage', [
					'id' => $data -> id,
					'title' => $data -> db_column,
					'text' => $data -> type,
					'text1' => $data -> label,
					'editLink' => route('moduleBlockEdit', [$moduleStep -> module -> id, $moduleStep -> id, $data -> id]),
					'deleteLink' => route('moduleBlockDelete', [$moduleStep -> module -> id, $moduleStep -> id, $data -> id]),
					'possibilityToDelete' => true,
					'possibilityToRang' => true,
					'possibilityToEdit' => true,
					'checkboxId' =>  $data->id
				])
			@endforeach
		</div>
    </div>
@endsection
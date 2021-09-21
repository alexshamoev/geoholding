@extends('master')


@section('pageMetaTitle')
	{{ $page -> title }}
@endsection


@section('content')
    <h1 class="p-2">
        {{ $page -> title }}
    </h1>

    <div class="p-2">
		{!! $page -> text !!}
    </div>

	<div class="row">
		@foreach($newsStep0 as $data)
			<div class="col-3">
				<a href="{{ $data -> fullUrl }}">
					<div class="p-2">
						<div class="p-2">
							<img src="{{ asset('/images/modules/news/'.$data -> id.'.jpg') }}" alt="{{ $data -> title }}">
						</div>

						<div class="p-2">
							{{ $data -> title }}
						</div>

						<div class="p-2">
							{!! $data -> text !!}
						</div>
					</div>
				</a>
			</div>
		@endforeach
	</div>
@endsection
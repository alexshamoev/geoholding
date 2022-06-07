@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection

@section('content')
	<div class="container p-2 main_content--height">
		<h1 class="p-2">
			{{ $page -> title }}
		</h1>

		<div class="p-2">
			{!! $page -> text !!}
		</div>

		<div class="row">
			<div class="p-2">
				სახელი: {{ $user -> name }}
			</div>

			<div class="p-2">
				გვარი: {{ $user -> last_name }}
			</div>

			<div class="p-2">
				ელ.ფოსტა: {{ $user -> email }}
			</div>

			<div class="p-2">
				ტელეფონი: {{ $user -> phone }}
			</div>
			
			<div class="p-2">
				მისამართი: {{ $user -> address }}
			</div>

			<div>
				<a href="{{ route('editCabinet', $language->title) }}">
					მონაცემების შეცვლა
				</a>
			</div>
		</div>
	</div>
@endsection
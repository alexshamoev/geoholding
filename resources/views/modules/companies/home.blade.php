@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $activeHome -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $activeHome -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $activeHome -> metaUrl }}@endsection

@section('content')
	<div class="">
		<div class="container p-2">
			<div class="row">
				<div class="col-lg-6 p-xl-5 d-flex align-items-center home__text_head">
					<div class="p-xl-5 pt-xl-0">
						<div class="p-xxl-5 text-sm-start text-center">
							<h1  class="home__title pb-4 ">{{ $activeHome->section1title }}</h1>
							<div class="home__head_text">{!! $activeHome->section1text !!}</div>
							<button class="home__button 
											mt-4 
											border-0 
											p-2 
											px-3
											text-white 
											rounded">ღილაკი სხვა გვერდისთვის
							</button>
						</div>
					</div>
				</div>

				<div class="col-lg-6 p-sm-5 p-0 pt-sm-0">
					<div class="p-xxl-5 pt-0">
						<div class="p-xl-5 p-2">
							@if (file_exists(public_path('storage/images/modules/companies/81/s1_' . $activeHome->id . '.jpg')))
								<div class="home__gradient">
									<img class="home__gradinet_div" src="{{ asset('storage/images/modules/companies/81/s1_' . $activeHome->id . '.jpg') }}" alt="{{ $activeHome->section1title }}">
								</div>							
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container py-5">
			<div class="row">
				<div class="col-lg-6 mb-lg-0 mb-5">
					<div class="home__about_us_box">
						@if (file_exists(public_path('storage/images/modules/companies/81/s2_' . $activeHome->id . '.jpg')))
							<div class="rounded-circle 
										home__about_us_img 
										d-block position-relative">
								<img class="rounded-circle" src="{{ asset('storage/images/modules/companies/81/s2_' . $activeHome->id . '.jpg') }}" alt="{{ $activeHome->section2title }}">
								<div class="home__about_us_mini_circle 
											position-absolute 
											w-100 
											h-100 
											top-0 
											rounded-circle"></div>
							</div>
						@endif
					</div>
				</div>

				<div class="col-lg-6 pe-5">
					<div class="pe-5">
						<h2 class="p-2">{{ $activeHome->section2title }}</h2>
						<div class="p-2 home__about_us_text">{!! $activeHome->section2text !!}</div>
					</div>
				</div>
			</div>
		</div>

		<div class="home__banner_section my-5">
			<div class="container p-2">
				<div class="row px-xl-5">
					@if (!empty($activeHome->services))
						@foreach ($activeHome->services as $item)
							<div class="col-lg-3 col-md-4 col-sm-6 p-2">
								<div class="bg-white rounded-3 p-2">
									@if (file_exists(public_path('storage/images/modules/companies/82/' . $item->id . '.svg')))
										<img class="home__banner_icon p-2" src="{{ asset('storage/images/modules/companies/82/' . $item->id . '.svg') }}" alt="{{ $item->title }}">
									@endif
									<h1 class="p-2">{{ $item->title }}</h1>
									<div class="p-2">{!! $item->text !!}</div>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-6">
					<h1>{{ $activeHome->section3title }}</h1>
					<div>{!! $activeHome->section3text !!}</div>
				</div>
				
				<div class="col-6"></div>
			</div>
			
		</div>

		@if (!empty($activeHome->products))
			<h1>{{ $activeHome->products->title }}</h1>
			<p>{!! $activeHome->products->text !!}</p>
			@foreach ($activeHome->products->images as $item)
				@if (file_exists(public_path('storage/images/modules/companies/84/' . $item->id . '.jpg')))
					<img class="w-25" src="{{ asset('storage/images/modules/companies/84/' . $item->id . '.jpg') }}" alt="{{ $item->title }}">
				@endif
			@endforeach
			
		@endif

		@if (!empty($activeHome->reason))
			<h1>{{ $activeHome->reason->title }}</h1>
			<p>{!! $activeHome->reason->text !!}</p>
			
			@php $id = 0; @endphp
			@foreach ($activeHome->reason->reasons as $item)
				{{ ++$id }}
				<h1>{{ $item->title }}</h1>
				<p>{!! $item->text !!}</p>
			@endforeach
			
		@endif

	</div>
@endsection
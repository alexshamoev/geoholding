@extends('master')

@section('pageMetaTitle'){{ $page->metaTitle }}@endsection
@section('pageMetaDescription'){{ $page->metaDescription }}@endsection
@section('pageMetaUrl'){{ $page->metaUrl }}@endsection

@section('content')
	<div class="container
				p-2
				main_content--height
				basket">
		<h1 class="p-2">
			{{ $page->title }}
		</h1>

		<div class="p-2">
			{!! $page->text !!}
		</div>
		
		<div class="row">
			<div class="col-xxl-9
						col-xl-8
						col-12
						p-0
						basket__products_list">
				<div class="row">
					<div class="col-lg-5
								col-md-4
								col-6">
						{{ __('bsw.products') }}					
					</div>

					<div class="col-lg-1
								col-2
								text-center">
						{{ __('bsw.price') }}																	
					</div>

					<div class="col-2
								text-center">
						{{ __('bsw.sum') }}																	
					</div>

					<div class="col-xxl-2
								col-xl-3
								col-lg-2
								col-md-3
								col-4
								text-center">
						{{ __('bsw.amount') }}																
					</div>				
				</div>

				<!-- Product template for local storage products -->
					<div class="basket__product_template
								row" data-id="">
						<div class="p-2">
							<div class="basket__dividing_line"></div>
						</div>

						<div class="col-md-2
									col-3">
							<img class="basket__product_image" src="">
						</div>

						<div class="col-lg-3
									col-md-2
									col-3
									d-flex
									align-items-center
									justify-content-center">
							<div class="basket__product_title"></div>
						</div>
						
						<div class="col-lg-1
									col-2
									d-flex
									align-items-center
									justify-content-center
									d-none
									d-md-flex">
							<div class="basket__product_price"></div>

							<div class="px-1"> ₾ </div>
						</div>

						<div class="col-2
									d-flex
									align-items-center
									justify-content-center
									d-none
									d-md-flex">
							<div class="basket__product_price_sum"></div>

							<div class="px-1"> ₾ </div>
						</div>

						<div class="col-xxl-2
									col-xl-3
									col-lg-2
									col-md-3
									col-5
									d-flex
									align-items-center
									justify-content-center">
							<div class="basket__amount
										d-flex">					
								<div class="d-flex
											justify-content-center
											align-items-center
											decrease">
									<span class="px-3
												py-2
												basket__minus_btn">
										-
									</span>
								</div>

								<input type="text"
										name="quantity[]"
										value=""
										class="basket__product_amount">

								<div class="d-flex
											justify-content-center
											align-items-center
											increase">
									<span class="px-3
												py-2
												basket__plus_btn">
										+
									</span>
								</div>
							</div>						
						</div>

						<div class="col-xxl-2
									col-xl-1
									col-lg-2
									col-1
									d-flex
									align-items-center
									justify-content-center">
							<div class="basket__product_delete_button">
								<img src="{{ asset('/storage/images/delete-button.svg') }}">
							</div>
						</div>
					</div>
				<!--  -->
			</div>
			
			<div class="col-xxl-3
						col-xl-4
						col-12">
				<div class="basket__sum_container">
					<div class="basket__details
								p-2">
						<h3>
							{{ __('bsw.order_details') }}										
						</h3>
					</div>

					<div class="p-2
								d-flex
								align-items-center">
						{{ __('bsw.total_cost') }}:									
						
						<div class="d-flex
									justify-content-center
									align-items-center
									px-2
									basket__price">
							<div class="basket__sum
										px-1"></div>
							<div>₾</div>
						</div>
					</div>
					
					<div class="p-2
								d-flex
								align-items-center">
						{{ __('bsw.transportation') }}:									

						<div class="px-2
									basket__price"> 
							{{ __('bsw.by_agreement') }}
						</div>
					</div>

					<div class="p-2
								d-flex
								align-items-center">
						{{ __('bsw.address') }}:									

						<div class="px-2
									basket__price">
							{{--
								{{ Auth :: user()->address }}
							--}}
						</div>
					</div>

					<div class="p-2
								basket__total
								d-flex
								justify-content-center
								align-items-center">
						{{ __('bsw.all') }}:

						<div class="p-2
									d-flex
									align-items-center">
							<div class="basket__sum"></div>
							<div class="px-1">₾</div>
						</div>
					</div>

					<a href="{{ '/'.$language->title.'/'.$orderPage->alias }}">
						<div class="basket__submit
									p-3">
							{{ __('bsw.buy') }}
						</div>
					</a>
				</div>
			</div>
		</div>

		<div class="js_basket_empty
					d-none
					d-flex
					justify-content-center">
			{{ __('bsw.basket_empty') }}
		</div>
	</div>

	<input type="hidden"
			value="{{ app()->getLocale() }}"
			class="app_lang">
@endsection
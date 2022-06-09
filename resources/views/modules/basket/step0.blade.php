@extends('master')

@section('pageMetaTitle'){{ $page -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $page -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $page -> metaUrl }}@endsection

@section('content')
	<div class="container border-0 py-5">
		<div class="basket">
			<h1 class="p-2 border-0">
				{{ $page -> title }}
			</h1>

			<div class="p-2">
				{!! $page -> text !!}
			</div>

			{{ Form::open(array('route' => array('order', $language -> title), 'method' => 'post')) }}
				<!-- Products from local storage -->
					<div class="row align-items-center">
						<div class="col-xxl-9 col-xl-8 col-12 basket__products_list">
							<div class="row text-uppercase p-3">
								<div class="col-lg-5 col-md-4 col-6 py-2">
									{!! __('bsw.products') !!}					
								</div>

								<div class="col-lg-1 col-2 py-2 d-flex justify-content-center align-items-center d-none d-md-flex">
									{!! __('bsw.price') !!}																	
								</div>

								<div class="col-2 py-2 d-flex justify-content-center align-items-center d-none d-md-flex">
									{!! __('bsw.sum') !!}																	
								</div>

								<div class="col-xxl-2 col-xl-3 col-lg-2 col-md-3 col-4 d-flex justify-content-center align-items-center">
									{!! __('bsw.amount') !!}																
								</div>				
							</div>

							<div class="basket__product_template row p-3">
								<div class="col-md-2 col-3 d-flex align-items-center justify-content-center">
									<img class="basket__product_image" src="">
								</div>

								<div class="col-lg-3 col-md-2 col-3 d-flex align-items-center justify-content-center">
									<div class="basket__product_title"></div>
								</div>
								
								<div class="col-lg-1 col-2 d-flex align-items-center justify-content-center d-none d-md-flex">
									<div class="basket__product_price"></div>
									<div class="px-1"> ₾ </div>
								</div>

								<div class="col-2 d-flex align-items-center justify-content-center d-none d-md-flex">
									<div class="basket__product_price_sum"></div>
									<div class="px-1"> ₾ </div>
								</div>

								<div class="col-xxl-2 col-xl-3 col-lg-2 col-md-3 col-5 d-flex align-items-center justify-content-center">
									<div class="basket__amount d-flex">					
										<div class="d-flex justify-content-center align-items-center decrease">
											<span class="px-3 py-2 basket__minus_btn">
												-
											</span>
										</div>

										<input type="text"
												name="quantity[]"
												value=""
												class="basket__product_amount">

										<div class="d-flex justify-content-center align-items-center increase">
											<span class="px-3 py-2 basket__plus_btn">
												+
											</span>
										</div>
									</div>						
								</div>

								<div class="col-xxl-2 col-xl-1 col-lg-2 col-1 d-flex align-items-center justify-content-center">
									<div class="basket__product_delete_button d-flex align-items-center justify-content-center">
										<img src="{{ asset('/storage/images/delete-button.svg') }}">
										
									</div>
								</div>

								<input type="hidden"
										name="productId[]"
										value=""
										class="basket__product_id">
							</div>
						</div>
						
						<div class="col-xxl-3 col-xl-4 col-12">
							<div class=" p-0 basket__sum_container">
								<div class="basket__details p-2">
									<h3 class="p-3 text-uppercase">
										{!! __('bsw.order_details') !!}										
									</h3>
								</div>

								<div class="px-3 py-5">
									<div class="p-2 d-flex align-items-center">
										<p class="text-uppercase">
											{!! __('bsw.total_cost') !!}:									
										</p>
										<div class="d-flex justify-content-center align-items-center px-2 basket__price">
											<div class="basket__sum px-1"></div>
											<div>₾</div>
										</div>
									</div>
									
									<div class="p-2 d-flex align-items-center">
										<p class="text-uppercase"> 
											{!! __('bsw.transportation') !!}:									
										</p>
										<p class="px-2 basket__price text-uppercase"> 
											{!! __('bsw.by_agreement') !!}
										</p>
									</div>

									<div class="p-2 d-flex align-items-center">
										<p class="text-uppercase"> 
											{!! __('bsw.address') !!}:									
										</p>
										<p class="px-2 basket__price text-uppercase"> 
											{{ Auth :: user() -> address }}
										</p>
									</div>
								</div>

								<div class="p-2 basket__total d-flex justify-content-center align-items-center">
									<p class="text-uppercase">
										{!! __('bsw.all') !!} :	
									</p>
									<div class="p-2 d-flex align-items-center">
										<div class="basket__sum"></div>
										<div class="px-1">₾</div>
									</div>				
								</div>
							</div>
						</div>
					</div>

					<div class="row justify-content-end py-4">
						<div class="col-lg-3 col-12">
							{{ Form::submit(__('bsw.buy'), ['class' => 'basket__submit']) }}
						</div>
					</div>
				<!--  -->
			{{ Form::close() }}
		</div>

		<div class="empty_basket d-none d-flex justify-content-center">
			{!! __('bsw.basket_empty') !!}																		
		</div>
	</div>

	<input type="hidden"
			value="{{ app() -> getLocale() }}"
			class="app_lang">
@endsection
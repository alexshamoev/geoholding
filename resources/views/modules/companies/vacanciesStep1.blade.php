@extends('master')

@section('pageMetaTitle'){{ $activeCompany->title .' - '. $active -> metaTitle }}@endsection
@section('pageMetaDescription'){{ $active -> metaDescription }}@endsection
@section('pageMetaUrl'){{ $active -> metaUrl }}@endsection

@section('content')
	<div class="container d-flex flex-column">
		<div>
			@isset($active)
			<div class="col-11 border rounded-5 vacancies_step1__header_wrapper p-0">
				<div class="row border-bottom border-info p-2">
					<span class="col-3">{{ __('bsw.position_name') }}:</span>
					<span class="col-7">{{ $active->title }}</span>
				</div>
				<div class="row border-bottom border-info p-2">
					<span class="col-3">{{ __('bsw.last_date') }} / {{ __('bsw.published') }}:</span>
					<span class="col-7">{{ $active->last_date }} / {{ date_format($active->created_at,"d.m.Y") }}</span>
				</div>
				<div class="row border-bottom border-info p-2">
					<span class="col-3">{{ __('bsw.location') }}:</span>
					<span class="col-7">{{ __($active->location) }}</span>
				</div>
				<div class="row p-2">
					<span class="col-3">{{ __('bsw.send_resume') }}:</span>
					<span class="col-7">{{ $active->email }}</span>
				</div>
			</div>
				<div class="mt-5 col-11">
					{!! $active->text !!}
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi totam consequuntur necessitatibus unde, earum obcaecati culpa delectus accusantium quam maxime quod? Cum saepe expedita dignissimos ad, accusamus nesciunt, blanditiis deleniti in dolores laboriosam vero iure aut tenetur dolore, eveniet recusandae necessitatibus. Nihil quos tenetur nostrum, quam ipsam unde sapiente molestiae similique tempora et fugit error quis quisquam delectus consectetur facere incidunt a accusamus, repellendus eligendi perspiciatis dolorum soluta ipsa? Expedita, doloribus. Illo odio voluptate debitis, hic nesciunt, sint, quos laborum beatae cum ratione eligendi libero facere dolore cumque iste quo? Eum quas debitis fugiat dolores quod! Quidem eveniet eos placeat fugiat. Quasi, quam ad inventore fuga autem atque at modi magnam assumenda similique explicabo blanditiis ullam dolor. Quo aperiam saepe ipsam aliquid dolorum dolores non, quia in. Nemo minus laboriosam veniam labore tempore deserunt vitae quia maiores! Commodi autem, quidem velit ipsum delectus officia necessitatibus debitis quae natus ducimus illum, quibusdam incidunt! Iste similique exercitationem, hic animi dolores voluptatum. Vitae earum sit, possimus quae nostrum autem recusandae deserunt minima eligendi dolor necessitatibus tempore et. Perspiciatis sed velit quia excepturi magni quae magnam facere eligendi consequuntur vero, quos et inventore incidunt? Quod unde, explicabo aut officiis eligendi illum exercitationem veritatis magnam. Similique laudantium corporis deleniti at veritatis deserunt nesciunt repellat eius dicta quae minima repudiandae, unde excepturi velit architecto esse omnis quaerat doloremque laboriosam vero voluptatibus blanditiis ipsam nostrum amet? Enim dolore recusandae minus, delectus voluptas mollitia, suscipit consequatur facilis pariatur impedit modi totam placeat deleniti minima! Maiores suscipit vitae voluptatem praesentium accusantium, doloribus, atque adipisci sit, ipsum saepe repellendus quos? Dolor eligendi commodi amet. Voluptatem placeat laboriosam sunt sed ipsa sapiente inventore officia illo quas iste maiores reiciendis, dolores explicabo eligendi omnis culpa tenetur. Distinctio fugit numquam adipisci voluptas necessitatibus, nobis id cupiditate, tempora natus sapiente nulla. Doloribus optio temporibus odio odit obcaecati sequi natus. Vitae, aspernatur fugit quo dolores repudiandae laborum atque aliquam error cum rerum dolor libero omnis tempora, quod adipisci quibusdam! Eveniet vero culpa veniam, hic soluta alias, deserunt aspernatur numquam maiores non sit modi, quisquam eaque provident facere laborum voluptate quas. Quasi est repellat omnis quia voluptates dolores non sapiente ea fugit voluptatibus inventore maxime commodi, expedita eos voluptas, eius illum odio aspernatur suscipit obcaecati. Explicabo dicta at perspiciatis, non quos corporis nam consectetur cumque fugiat architecto alias totam debitis accusantium fuga doloribus earum temporibus assumenda voluptatum ea. Minima iste in soluta porro dolorum possimus neque explicabo deleniti deserunt nam, eaque natus accusantium quia saepe placeat quis voluptas est. Nam dolorem quidem tempora perferendis voluptas aut similique alias autem exercitationem! Numquam amet, tenetur consectetur perferendis non, ducimus minus ea repellendus quisquam accusantium adipisci culpa dolorum odio velit quasi? Autem ad quod sequi maiores natus officia aliquam, possimus tempore, doloribus tenetur incidunt temporibus. Soluta temporibus cum, tenetur esse eos sit iusto earum. Perspiciatis possimus voluptatem sunt illo magnam laboriosam, veritatis rem voluptates eaque eius ut, sit voluptas, esse similique labore fugit tenetur sequi quidem error doloribus. Doloribus a deleniti pariatur sequi, facere recusandae maiores ab explicabo culpa.
				</div>
			@endisset

		</div>

	</div>

@endsection
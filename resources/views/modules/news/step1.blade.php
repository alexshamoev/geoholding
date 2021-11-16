@extends('master')


@section('pageMetaTitle')
    News Step 0
@endsection


@section('content')
	<section class="news_step1__section">
		<div class="container">
			<div class="p-2">
				<a href="{{ '/'.$language -> title.'/'.$page -> alias }}">
					{{ $page -> title }}
				</a>
				{{ $activeNews -> title }}
			</div>
			
			<h1 class="p-2">
				{{ $activeNews -> alias }}
			</h1>
		
			<div class="p-2">
				{{ $activeNews -> title }}
			</div>
		
			<div class="p-2">
				{!! $activeNews -> text !!}
			</div>
		
			<div class="float-right img_wrapper">
				<div class="p-2">
					<img src="{{ asset('/storage/images/modules/news/'.$activeNews -> id.'.jpg') }}" alt="{{ $activeNews -> title }}">
				</div>
			</div>
			<div class="p-2">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi vel dolor voluptates nihil. Nobis placeat dicta debitis aut error fugiat eos rem esse, neque totam earum. Qui doloremque explicabo dolores repudiandae earum aperiam rem nihil veritatis ad voluptatem porro atque omnis provident numquam vel optio, et aspernatur corrupti, quas autem minus. Obcaecati dicta unde esse ipsam nesciunt ullam praesentium vitae possimus minima aliquam quibusdam id soluta nobis maxime, doloribus a natus nulla iure est nam beatae impedit tenetur incidunt quasi. Eos, necessitatibus aliquid. Fugit modi recusandae architecto, impedit, quibusdam sint adipisci quo pariatur, repudiandae corrupti repellat debitis delectus expedita dolorum? Saepe optio consequuntur deserunt nisi sunt veniam aspernatur tenetur vel quas ad pariatur minima expedita sed maxime possimus ducimus, porro labore ipsam culpa modi est corporis sequi? Inventore similique repellendus maiores obcaecati recusandae, voluptates dolore ratione nesciunt, repellat ipsam vero dolorem libero amet labore sed! A voluptatum molestiae illo nostrum!
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi vel dolor voluptates nihil. Nobis placeat dicta debitis aut error fugiat eos rem esse, neque totam earum. Qui doloremque explicabo dolores repudiandae earum aperiam rem nihil veritatis ad voluptatem porro atque omnis provident numquam vel optio, et aspernatur corrupti, quas autem minus. Obcaecati dicta unde esse ipsam nesciunt ullam praesentium vitae possimus minima aliquam quibusdam id soluta nobis maxime, doloribus a natus nulla iure est nam beatae impedit tenetur incidunt quasi. Eos, necessitatibus aliquid. Fugit modi recusandae architecto, impedit, quibusdam sint adipisci quo pariatur, repudiandae corrupti repellat debitis delectus expedita dolorum? Saepe optio consequuntur deserunt nisi sunt veniam aspernatur tenetur vel quas ad pariatur minima expedita sed maxime possimus ducimus, porro labore ipsam culpa modi est corporis sequi? Inventore similique repellendus maiores obcaecati recusandae, voluptates dolore ratione nesciunt, repellat ipsam vero dolorem libero amet labore sed! A voluptatum molestiae illo nostrum!
			</div>
			<div class="clear-both"></div>
		</div>
	</section>
@endsection
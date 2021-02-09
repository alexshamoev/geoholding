@extends('layouts.master')


@section('pageMetaTitle')
    Contact
@endsection


@section('content')
    <h1 class="p-2">
        Contact
    </h1>

 
	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif


    <div>
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur necessitatibus magni eaque cupiditate praesentium enim
            recusandae incidunt sapiente dolore iusto ipsa sunt consectetur assumenda temporibus iure odit consequuntur, labore minus!
        </p>
    </div>


    <form action="{{ route('contact-form') }}" method="post">
        @csrf
        
        <div class="form_group">
            <label>
                Type Name
                <br>

                <input type="text"
                        name="name"
                        placeholder="Type Name"
                        id="name"
                        class="form-control">
            </label>
        </div>

        <div class="form_group">
            <label>
                E-mail
                <br>

                <input type="text"
                        name="email"
                        placeholder="E-mail"
                        id="email"
                        class="form-control">
            </label>
        </div>

        <div class="form_group">
            <input type="submit"
                    class="btn btn-success"
                    value="Send">
        </div>
    </form>
@endsection


@section('menu')
    <div class="p-2">
        Menu on Contact
    </div>


    @parent
@endsection
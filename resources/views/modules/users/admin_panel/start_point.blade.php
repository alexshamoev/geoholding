@extends('admin.master')


@section('pageMetaTitle')
    {{ $module->title }}
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => $module->title
	])

    
    <div class="container mt-3 mb-4">
        <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                        <table class="table manage-candidates-top mb-0">
                            <div>
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th class="text-center"scope="col">Verified</th>
                                        <th>Reg. Method</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                            </div>

                            @foreach($users as $data)
                                <tbody>
                                    <tr class="candidates-list">
                                        <td class="title">
                                            @if(file_exists(public_path('storage/images/modules/users/'.$data->id.'.jpg')))
                                                <div class="thumb">
                                                    <img class="img-fluid" src="{{ asset('storage/images/modules/users/'.$data->id.'.jpg') }}" alt="">
                                                </div>
                                            @else 
                                                @if($data->social_type === 'google')
                                                    <div class="thumb">
                                                        <img class="img-fluid" src="{{ $data->avatar_url }}" alt="Default Text">
                                                    </div>
                                                @else
                                                    <div class="thumb">
                                                        <img class="img-fluid" src="{{ asset('storage/images/modules/users/default.png') }}" alt="Default Text">
                                                    </div>
                                                @endif
                                            @endif

                                            <div class="candidate-list-details">
                                                <div class="candidate-list-info">
                                                    <div class="candidate-list-title">
                                                        <h5 class="mb-0">
                                                            <a href="{{ route('users.edit', $data->id) }}">
                                                                {{ $data->name }} {{ $data->last_name }}
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div class="candidate-list-option">
                                                        <ul class="list-group list-unstyled">
                                                            <li><i class="fa-solid fa-envelope"></i></i> {{ $data->email }}</li>
                                                            <li><i class="fas fa-map-marker-alt pr-1"></i> {{ $data->address }}</li>
                                                            <li><i class="fa-solid fa-phone"></i> {{ $data->phone }}</li>
                                                        </ul>
                                                    </div> 
                                                </div>
                                            </div>
                                        </td>

                                        <td class="candidate-list-favourite-time text-center">
                                            <div class="row">
                                                <div class="p-2">
                                                    @if($data->email_verified_at)
                                                        <i class="fa-solid fa-circle-check text-success fa-lg"></i>
                                                    @else
                                                        <i class="fa-solid fa-circle-xmark text-danger fa-lg"></i>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="mb-0 row p-4">
                                                @if($data->social_type === 'facebook')
                                                    <div class="p-2">
                                                        <i class="fa-brands fa-facebook text-primary fa-lg"></i>
                                                    </div>
                                                @endif

                                                @if($data->social_type === 'google')
                                                    <div class="p-2">
                                                        <i class="fa-brands fa-google text-info fa-lg"></i>
                                                    </div>
                                                @endif

                                                @if(!$data->social_type)
                                                    <div class="p-2">
                                                        <img src="{{ asset('/storage/images/admin/logo.svg') }}" alt="Move" style="width:23px;"  class="bar-tag-bigger-img">
                                                    </div>
                                                @endif
                                            </div>
                                        </td>

                                        <td>
                                            <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                                <li>
                                                    <a href="{{ route('users.edit', $data->id) }}">
                                                        <i class="fa-solid fa-user-pen text-warning fa-lg"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('users.destroy', $data->id) }}">
                                                        <i class="fa-solid fa-trash text-danger fa-lg"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


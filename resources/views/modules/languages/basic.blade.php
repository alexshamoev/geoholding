<div class="p-2 languages d-flex justify-content-end custom-select" id="select-option">
    @foreach($languages as $data)
        @if($data->isActive)
            <div class="selected-option">
                selected item
            </div>

            <div class="border rounded options-list">
                <div class="languages__block languages__block--active text-center selected-option option" data-value="option1">
                    <div class="d-flex">
                        <div class="p-2">
                            <img src="{{ asset('/storage/images/modules/languages/'.$data->id.'.svg') }}" alt="{{ $data->full_title }}" >
                        </div>

                        <div class="p-1 d-lg-block d-none">
                            {{ $data->full_title }}
                        </div>
                    </div>
                </div>
        @else
                <div class="languages__block text-center" data-value="option2">
                    <a href="{{ $data->fullUrl }}">
                        <div class="d-flex">
                            <div class="p-2">
                                <img src="{{ asset('/storage/images/modules/languages/'.$data->id.'.svg') }}" alt="{{ $data->full_title }}" >
                            </div>

                            <div class="p-1 d-lg-block d-none">
                                {{ $data->full_title }}
                            </div>
                        </div>
                    </a>
                </div>
        @endif
    @endforeach
</div>

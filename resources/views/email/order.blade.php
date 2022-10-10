@component('mail::message')
    <div>
        # Order #{{ $emailData['order']->order_code}}

        <div>{{ __('bsw.name') }}: {{ $emailData['user']->name }}</div>
        <div>{{ __('bsw.lastName') }}: {{ $emailData['user']->last_name }}</div>
        <div>{{ __('bsw.email') }}: {{ $emailData['user']->email }}</div>
        <div>{{ __('bsw.phone') }}: {{ $emailData['user']->phone }}</div>
        <div>{{ __('bsw.fullAddress') }}: {{ $emailData['user']->address }}</div>
        <div>{{ __('bsw.additionalDetails') }}: {{ $emailData['order']->details }}</div>
        
        <div>შეკვეთის თარიღი: {{ $emailData['order']->created_at }}</div>
        <div>სრული თანხა: {{ $emailData['order']->full_price }} ₾</div>

        @foreach($emailData['products'] as $key => $data)
            <div class="p-2">
                <div>პროდუქტი: {{ $data->{'title_'.$emailData['language']} }}</div>
                <div>ფასი: {{ $data->price }} ₾</div>
                <div>რაოდენობა: {{ $emailData['quantity'][$key] }} ცალი</div>
            </div>
        @endforeach


        @component('mail::button', ['url' => ''])
            Button Text
        @endcomponent


        Thanks,<br>
        {{ config('app.name') }}
    </div>
@endcomponent
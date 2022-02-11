<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute უნდა იქნას მიღებული.',
    'active_url' => ':attribute არ შეიცავს სწორ URL-მისამართს.',
    'after' => ':attribute უნდა იყოს თარიღი :date -ის შემდეგ.',
    'after_or_equal' => ':attribute უნდა იყოს თარიღი :date-ის შემდეგ ან ერთად.',
    'alpha' => ':attribute შეიძლება შეიცავდეს მხოლოდ ასოებს.',
    'alpha_dash' => ':attribute შეიძლება შეიცავდეს მხოლოდ ასოებს, ციფრებს, ტირეებს და ქვედა ხაზებს.',
    'alpha_num' => ':attribute შეიძლება შეიცავდეს მხოლოდ ასოებს და ციფრებს.',
    'array' => ':attribute უნდა იყოს მასივი.',
    'before' => ':attribute უნდა იყოს თარიღი :date -მდე.',
    'before_or_equal' => ':attribute უნდა იყოს თარიღი :date-მდე ან ერთად.',
    'between' => [
        'numeric' => ':attribute უნდა იყოს :min და :max შორის.',
        'file' => ':attribute უნდა იყოს :min და :max კილობაიტებს შორის.',
        'string' => ':attribute უნდა იყოს :min და :max სიმბოლოებს შორის.',
        'array' => ':attribute უნდა იყოს :min და :max ელემენტებს შორის.',
    ],
    'boolean' => ':attribute ის ველი უნდა იყოს true ან false.',
    'confirmed' => ':attribute დადასტურება არ ემთხვევა.',
    'date' => ':attribute არ შეიცავს ვალიდურ თარიღს.',
    'date_equals' => ':attribute უნდა იყოს თარიღი, რომელიც ტოლია :date.',
    'date_format' => ':attribute არ ემთხვევა ფორმატს :format.',
    'different' => ':attribute da :other უნდა იყოს განსხვავებული.',
    'digits' => ':attribute უნდა იყოს :digits ციფრები.',
    'digits_between' => ':attribute უნდა იყოს :min და :max ციფრებს შორის.',
    'dimensions' => ':attribute აქვს არასწორი გამოსახულების ზომები.',
    'distinct' => ':attribute ველს აქვს დუბლიკატი მნიშვნელობა.',
    'email' => ':attribute უნდა იყოს სწორი ელფოსტის მისამართი.',
    'ends_with' => ':attribute უნდა დასრულდეს ერთ-ერთი შემდეგი მნიშვნელობით: :values',
    'exists' => 'მონიშნული :attribute არ არსებობს.',
    'file' => ':attribute უნდა იყოს ფაილი.',
    'filled' => ':attribute ველს უნდა ჰქონდეს მნიშვნელობა.',
    'gt' => [
        'numeric' => ':attribute უნდე იყოს მეტი ვიდრე :value.',
        'file' => ':attribute უნდა იყოს  :value კილობაიტზე მეტი.',
        'string' => ':attribute უნდა იყოს :value სიმბოლოზე მეტი.',
        'array' => ':attribute უნდა შეიცავდეს :value ზე მეტ ელემენტს.',
    ],
    'gte' => [
        'numeric' => ':attribute უნდა იყოს :value ზე მეტი ან ტოლი.',
        'file' => ':attribute უნდა იყოს :value კილობაიტზე მეტი ან ტოლი.',
        'string' => ':attribute უნდა იყოს :value სიმბოლოზე მეტი ან ტოლი.',
        'array' => ':attribute უნდა შეიცავდეს :value ან მეტ ელემენტს.',
    ],
    'image' => ':attribute უნდა იყოს გამოსახულება.',
    'in' => 'მონიშნული :attribute არასწორია.',
    'in_array' => ':attribute ველი არ არსებობს :or ში.',
    'integer' => ':attribute უნდა იყოს მთელი რიცხვი.',
    'ip' => ':attribute must be a valid IP address.',
    'ipv4' => ':attribute must be a valid IPv4 address.',
    'ipv6' => ':attribute must be a valid IPv6 address.',
    'json' => ':attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => ':attribute must be less than :value.',
        'file' => ':attribute must be less than :value kilobytes.',
        'string' => ':attribute must be less than :value characters.',
        'array' => ':attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute must be less than or equal :value.',
        'file' => ':attribute must be less than or equal :value kilobytes.',
        'string' => ':attribute must be less than or equal :value characters.',
        'array' => ':attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute may not be greater than :max.',
        'file' => ':attribute may not be greater than :max kilobytes.',
        'string' => ':attribute may not be greater than :max characters.',
        'array' => ':attribute may not have more than :max items.',
    ],
    'mimes' => ':attribute must be a file of type: :values.',
    'mimetypes' => ':attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute must be at least :min.',
        'file' => ':attribute must be at least :min kilobytes.',
        'string' => ':attribute must be at least :min characters.',
        'array' => ':attribute must have at least :min items.',
    ],
    'not_in' => 'selected :attribute is invalid.',
    'not_regex' => ':attribute format is invalid.',
    'numeric' => ':attribute must be a number.',
    'present' => ':attribute field must be present.',
    'regex' => ':attribute format is invalid.',
    'required' => ':attribute ველი ინდა იყოს შევსებული.',
    'required_if' => ':attribute field is required when :or is :value.',
    'required_unless' => ':attribute field is required unless :or is in :values.',
    'required_with' => ':attribute field is required when :values is present.',
    'required_with_all' => ':attribute field is required when :values are present.',
    'required_without' => ':attribute field is required when :values is not present.',
    'required_without_all' => ':attribute field is required when none of :values are present.',
    'same' => ':attribute and :or must match.',
    'size' => [
        'numeric' => ':attribute must be :size.',
        'file' => ':attribute must be :size kilobytes.',
        'string' => ':attribute must be :size characters.',
        'array' => ':attribute must contain :size items.',
    ],
    'starts_with' => ':attribute must start with one of  following: :values',
    'string' => ':attribute must be a string.',
    'timezone' => ':attribute must be a valid zone.',
    'unique' => ':attribute has already been taken.',
    'uploaded' => ':attribute failed to upload.',
    'url' => ':attribute format is invalid.',
    'uuid' => ':attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];

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
    'email' => ':attribute უნდა იყოს ელ. ფოსტის მისამართი.',
    'ends_with' => ':attribute უნდა დასრულდეს ერთ-ერთი შემდეგი მნიშვნელობით: :values',
    'exists' => 'მონიშნული :attribute არ არსებობს.',
    'file' => ':attribute უნდა იყოს ფაილი.',
    'filled' => ':attribute ველს უნდა ჰქონდეს მნიშვნელობა.',
    'gt' => [
        'numeric' => ':attribute უნდა იყოს მეტი ვიდრე :value.',
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
    'ip' => ':attribute უნდა იყოს სწორი IP მისამართი..',
    'ipv4' => ':attribute უნდა იყოს სწორი IPV4 მისამართი..',
    'ipv6' => ':attribute უნდა იყოს სწორი IPV6 მისამართი..',
    'json' => ':attribute უნდა იყოს სწორი JSON სტრიქონი.',
    'lt' => [
        'numeric' => ':attribute უნდა იყოს :value -ზე ნაკლები.',
        'file' => ':attribute უნდა იყოს :value კილობაიტზე ნაკლები.',
        'string' => ':attribute უნდა იყოს :value სიმბოლოზე ნაკლები.',
        'array' => ':attribute არ უნდა შეიცავზეს :value -ზე ნაკლებ ელემენტს.',
    ],
    'lte' => [
        'numeric' => ':attribute უნდა იყოს ნაკლები ან ტოლი :value.',
        'file' => ':attribute უნდა იყოს :value კილობაიტზე ნაკლები ან ტოლი.',
        'string' => ':attribute უნდა იყოს :value სიმბოლოზე ნაკლები ან ტოლი.',
        'array' => ':attribute არ უნდა შეიცავდეს :value -ზე მეტ ელემენტს.',
    ],
    'max' => [
        'numeric' => ':attribute არ შეიძლება იყოს :max -ზე მეტი.',
        'file' => ':attribute არ შეიძლება იყოს :max კილბაიტზე მეტი.',
        'string' => ':attribute არ შეიძლება იყოს :max სიმბოლოზე მეტი.',
        'array' => ':attribute არ უნდა შეიცავდეს :max -ზე მეტ ელემენტს.',
    ],
    'mimes' => ':attribute უნდა იყოს შემდეგი ფაილის ტიპის: :values.',
    'mimetypes' => ':attribute უნდა იყოს შემდეგი ფაილის ტიპის: :values.',
    'min' => [
        'numeric' => ':attribute უნდა იყოს მინიმუმ :min.',
        'file' => ':attribute უნდა იყოს მინიმუმ :min კილობაიტი.',
        'string' => ':attribute უნდა იყოს მინიმუმ :min სიმბოლო.',
        'array' => ':attribute უნდა შეიცავდეს მინიმუმ :min ელემენტს.',
    ],
    'not_in' => 'მონიშნული :attribute არასწორია.',
    'not_regex' => ':attribute ფორმატი არ არის ვალიდური.',
    'numeric' => ':attribute უნდა იყოს ციფრი.',
    'present' => ':attribute ველი არ შეიძლება იყოს ცარიელი.',
    'regex' => ':attribute არასწორი ფორმატი.',
    'required' => ':attribute ველი აუცილებელია.',
    'required_if' => ':attribute ველი აუცილებელია როცა :or არის :value.',
    'required_unless' => ':attribute ველი საჭიროა თუ :or არ არის :values -ში.',
    'required_with' => ':attribute ველი აუცილებელია, თუ გვაქვს :values.',
    'required_with_all' => ':attribute ველი აუცილებელია, თუ გვაქვს :values.',
    'required_without' => ':attribute ველი აუცილებელია, თუ არ გვაქვს :values.',
    'required_without_all' => ':attribute ველი აუცილებელია, როცა არ გვაქვს არცერთი :values.',
    'same' => ':attribute და :or უნდა ემთხვეოდნენ.',
    'size' => [
        'numeric' => ':attribute უნდა იყოს :size.',
        'file' => ':attribute უნდა იყოს :size კილობაიტი.',
        'string' => ':attribute უნდა იყოს :size სიმბოლო.',
        'array' => ':attribute უნდა შეიცავდეს :size ელემენტს.',
    ],
    'starts_with' => ':attribute უნდა დაიწყოს შემდეგი ელემენტებით: :values',
    'string' => ':attribute უნდა იყოს სტრიქონი.',
    'timezone' => ':attribute უნდა იყოს ვალიდური ზონა.',
    'unique' => ':attribute უკვე გამოყენებულია.',
    'uploaded' => ':attribute ატვირთვა ვერ მოხერხდა.',
    'url' => ':attribute ფორმატი არასწორია.',
    'uuid' => ':attribute უნდა იყოს ვალიდური UUID.',

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

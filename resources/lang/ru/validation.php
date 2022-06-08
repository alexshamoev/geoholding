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

    'accepted' => ':attribute должен быть принят.',
    'active_url' => ':attribute не является допустимым URL.',
    'after' => ':attribute должен быть датой после :date.',
    'after_or_equal' => ':attribute должен быть датой после или равным :date.',
    'alpha' => ':attribute может содержать только буквы.',
    'alpha_dash' => ':attribute может содержать только буквы, цифры, тире и символы подчеркивания.',
    'alpha_num' => ':attribute может содержать только буквы и цифры.',
    'array' => ':attribute должен быть массивом.',
    'before' => ':attribute должен быть датой до :date.',
    'before_or_equal' => ':attribute должен быть датой до или равной :date.',
    'between' => [
        'numeric' => ':attribute должен быть между :min и :max.',
        'file' => ':attribute должен быть между :min и :max килобайтами.',
        'string' => ':attribute олжен находиться между символами :min и :max.',
        'array' => ':attribute должен иметь от :min до :max элементов.',
    ],
    'boolean' => ':attribute должно быть true и false.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'date' => ':attribute не является действительной датой.',
    'date_equals' => ':attribute должен быть датой, равной :date.',
    'date_format' => ':attribute не совпадает :format.',
    'different' => ':attribute и :other должны быть разными.',
    'digits' => ':attribute должны быть :digits цифры.',
    'digits_between' => ':attribute должен быть между :min и :max цифрами.',
    'dimensions' => ':attribute имеет неверные размеры изображения.',
    'distinct' => ':attribute имеет повторяющиеся значения.',
    'email' => ':attribute должен быть адресом эл. почты.',
    'ends_with' => ':attribute должен заканчиваться одним из следующих значений: :values',
    'exists' => 'Выбранный :attribute недействителен.',
    'file' => ':attribute должен быть файлом.',
    'filled' => ':attribute должно иметь значение.',
    'gt' => [
        'numeric' => ':attribute должен быть больше :value.',
        'file' => ' :attribute должен быть больше :value килобайт.',
        'string' => ':attribute должен быть больше, чем :value символов.',
        'array' => ':attribute должен иметь больше, чем :value элементов.',
    ],
    'gte' => [
        'numeric' => ':attribute должен быть больше или равен :value.',
        'file' => ':attribute должен быть больше или равен :value килобайт.',
        'string' => ':attribute должен быть больше или равен :value символов.',
        'array' => ':attribute должен содержать не менее :value элементов.',
    ],
    'image' => ':attribute должен быть изображением.',
    'in' => 'выбранный :attribute недействителен.',
    'in_array' => 'Поле :attribute не существует в :or.',
    'integer' => ':attribute должно быть целым числом.',
    'ip' => ':attribute должен быть действительным IP-адресом.',
    'ipv4' => ':attribute должен быть действительным IPV4-адресом.',
    'ipv6' => ':attribute должен быть действительным IPV6-адресом.',
    'json' => ':attribute должен быть допустимой строкой JSON..',
    'lt' => [
        'numeric' => ':attribute должно быть меньше, чем :value.',
        'file' => ':attribute должно быть меньше, чем :value килобайт.',
        'string' => ':attribute должно быть меньше, чем :value символов.',
        'array' => ':attribute должно содержать меньше :value элементов.',
    ],
    'lte' => [
        'numeric' => ':attribute должно быть меньше или равно :value.',
        'file' => ':attribute должно быть меньше или равно :value килобайт.',
        'string' => ':attribute должно быть меньше или равно :value символов.',
        'array' => ':attribute не должен содержать более :value элементов.',
    ],
    'max' => [
        'numeric' => ':attribute не может быть больше :max.',
        'file' => ':attribute не может быть больше :max килобайт.',
        'string' => ':attribute не может быть больше :max символов.',
        'array' => ':attribute может содержать не более :max элементов.',
    ],
    'mimes' => ':attribute должен быть файлом типа: :values.',
    'mimetypes' => ':attribute должен быть файлом типа: :values.',
    'min' => [
        'numeric' => ':attribute должен быть не меньше :min.',
        'file' => ':attribute должен быть не менее :min килобайт.',
        'string' => ':attribute должен быть не менее :min символов.',
        'array' => ':attribute должен содержать не менее :min элементов.',
    ],
    'not_in' => 'выбранный :attribute недействителен.',
    'not_regex' => 'недопустимый формат :attribute.',
    'numeric' => ':attribute должен быть числом.',
    'present' => 'поле :attribute должно присутствовать.',
    'regex' => 'недопустимый формат :attribute .',
    'required' => 'Поле :attribute обязательно.',
    'required_if' => 'Поле :attribute обязательно, если :or равно :value.',
    'required_unless' => 'Поле :attribute является обязательным, если только :or не находится в :values.',
    'required_with' => 'Поле :attribute является обязательным, когда присутствует :values.',
    'required_with_all' => 'Поле :attribute является обязательным, когда присутствует :values.',
    'required_without' => 'Поле :attribute обязательно, если :values отсутствует.',
    'required_without_all' => 'Поле :attribute требуется, если нет ни одного из :values.',
    'same' => ':attribute и :or должны совпадать.',
    'size' => [
        'numeric' => ':attribute должен быть :size.',
        'file' => ':attribute должен быть :size килобайт.',
        'string' => ':attribute должен содержать :size символов.',
        'array' => ':attribute должен содержать :size элемента.',
    ],
    'starts_with' => ':attribute должен начинаться с одного из следующих значений: :values',
    'string' => ':attribute должен быть строкой.',
    'timezone' => ':attribute должен быть допустимой зоной.',
    'unique' => ':attribute уже занято.',
    'uploaded' => 'Не удалось загрузить :attribute.',
    'url' => 'недопустимый формат :attribute.',
    'uuid' => ':attribute должен быть допустимым UUID.',

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

    'attributes' => [
        'name' => 'Имя',
        'last_name' => 'Фамилия',
        'email' => 'Эл. адрес',
        'phone' => 'Телефон',
        'address' => 'Адрес',
        'password' => 'Пароль',
        'confirmPassword' => 'Подтвердить Пароль',
    ],

];

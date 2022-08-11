<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
            'company_name' => 'required|min:2|max:255',
            'full_address' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255',
            'phone' => 'required|min:2|max:255',
        ];
    }
}

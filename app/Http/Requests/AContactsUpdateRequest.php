<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AContactsUpdateRequest extends FormRequest
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
            'admin_email' => 'required|email|max:255',
            'facebook_link' => 'required|max:255',
            'instagram_link' => 'required|max:255',
            'twitter_link' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'cordinate_x' => 'required|max:255',
            'cordinate_y' => 'required|max:255'
        ];
    }
}

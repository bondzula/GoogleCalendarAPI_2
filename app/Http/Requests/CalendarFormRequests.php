<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ReCaptcha;

class CalendarFormRequests extends FormRequest
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
            'name' => 'required|max:20',
            'phone' => 'required|max:15',
            'email' => 'required|email',
            'time' => 'required',
            'date' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha()]
        ];
    }
}

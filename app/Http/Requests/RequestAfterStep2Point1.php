<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAfterStep2Point1 extends FormRequest
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
            'print_format' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'print_format.required' => __('Jūs turite pasirinkti skrajutės formatą'),
            'print_format.numeric' => __('Jūs turite pasirinkti skrajutės formatą'),
        ];
    }
}

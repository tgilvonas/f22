<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestToStep3 extends FormRequest
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
            'order_type' => 'required|numeric',
            'print_format' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'order_type.required' => __('Jūs turite pasirinkti užsakymo tipą'),
            'order_type.numeric' => __('Jūs turite pasirinkti užsakymo tipą'),
            'print_format.required' => __('Jūs turite pasirinkti skrajutės formatą'),
            'print_format.numeric' => __('Jūs turite pasirinkti skrajutės formatą'),
        ];
    }
}

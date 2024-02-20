<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('put')) {
            return [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'point' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'cart_number' => 'required|string',
            ];
        }
//        if ($this->isMethod('post')) {
            return [
                'first_name',
                'last_name',
                'point',
                'email',
                'phone',
                'cart_number',
            ];
//        }
    }
}

<?php

namespace App\Http\Requests\Voucher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service_id' => ['nullable', 'exists:services,id'],
            'prefix' => ['nullable'],
            'is_used' => ['boolean'],
            'count' => ['required', 'min:1', 'max:1000'],
            'expiry_date' => ['nullable', 'date']
        ];
    }
}

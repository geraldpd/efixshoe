<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'unique:services,'.$this->service->id],
            'description' => ['required'],
            'cost' => ['required', 'numeric', 'max:99999'],
            'turnaround_time' => ['required', 'numeric'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}

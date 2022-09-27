<?php

namespace App\Http\Requests\Report;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class GenerateRequest extends FormRequest
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
        $statusses = Booking::statuses();
        $statusses[] = 'ALL';

        return [
            'report' => ['required'],
            'status' => [Rule::in($statusses)],
            'date_range' => ['required'],
            'custom_date_range_from' => 'required_if:date_range,custom',
            'custom_date_range_to' => 'required_if:date_range,custom'
        ];
    }
}

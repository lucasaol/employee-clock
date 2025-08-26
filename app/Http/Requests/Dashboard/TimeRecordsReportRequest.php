<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TimeRecordsReportRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'start' => 'nullable|date|date_format:Y-m-d',
            'end' => 'nullable|date|after_or_equal:start|date_format:Y-m-d',
        ];
    }

    public function messages(): array
    {
        return [
            'end.after_or_equal' => 'A data de fim deve ser igual ou posterior à data de início.',
        ];
    }
}

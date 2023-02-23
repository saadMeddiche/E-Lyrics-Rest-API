<?php

namespace App\Http\Requests;

use App\Enums\Langague;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class ParoleFormValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Parole' => [
                'required',
                'string'
            ],
            'Langue' => [
                'required',
                new EnumValue(Langague::class)
            ],
            'ID_Music' => [
                'required',
                'integer'
            ]
        ];
    }
}

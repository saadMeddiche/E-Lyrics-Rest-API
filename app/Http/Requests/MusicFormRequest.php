<?php

namespace App\Http\Requests;

use App\Models\Music;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class MusicFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'artist_id' => 'required|exists:artists,id',
            // 'user_id' => 'required|exists:users,id',
            'album_id' => 'required|exists:albums,id'
        ];
    }
    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));

    }



    public function messages()

    {
        return [
            'title.required' => 'Title is required',
            'artist_id.required' => 'Artist id is required'
        ];
    }
}

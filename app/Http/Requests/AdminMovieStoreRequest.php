<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminMovieStoreRequest extends FormRequest
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
        $id = $this->route('id');

        return [
            'title' => ['required', Rule::unique('movies')->ignore($id)],
            'image_url' => 'required|url',
            'published_year' => 'required',
            'is_showing' => 'required',
            'description' => 'required',
            'genre' => 'required'
        ];
    }
}

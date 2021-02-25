<?php

namespace App\Http\Requests\Product;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['sometimes'],
            'author' => ['sometimes'],
            'price' => ['sometimes', 'regex:/^\d+(\.\d{1,2})?$/'],
            'media' => ['sometimes', 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'],
            'status' => ['sometimes', 'in:' . implode(',', Status::getValues())],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function data()
    {
        return $this->only('name', 'author', 'price', 'status');
    }
}

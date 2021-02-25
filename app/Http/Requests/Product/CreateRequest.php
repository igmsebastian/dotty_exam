<?php

namespace App\Http\Requests\Product;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => ['required'],
            'author' => ['required'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'media' => ['required', 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'],
            'status' => ['required', 'in:' . implode(',', Status::getValues())],
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

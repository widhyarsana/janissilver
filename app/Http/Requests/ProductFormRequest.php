<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:30'],
            'price' => ['required'],
            'materials' => ['required'],
            'varian' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'name.max:30' => 'Nama tidak boleh lebih dari 30',
            'price.required' => 'Harga tidak boleh kosong',
            'materials.required' => 'Bahan tidak boleh kosong',
            'varian.required' => 'Varian tidak boleh kosong',

        ];
    }
}

<?php

namespace App\Http\Requests\Admin\Catalog\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'slug' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'price' => 'required|integer',
            'on_home_page' => 'nullable|integer',
            'text' => 'nullable|string',
            'json_properties' => 'nullable|string',
            'properties' => 'nullable|array',
            'properties.*' => 'nullable|string',
            'categories' => 'required|array',
            'categories.*' => 'required|integer',
            'image' => 'mimes:png,jpg,jpeg,webp',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Це поле мусить бути заповнене!',
            'title.string' => 'Данні повинні відповідати строковому типу!',
            'slug.required' => 'Це поле мусить бути заповнене!',
            'slug.string' => 'Данні повинні відповідати строковому типу!',
            'price.required' => 'Це поле мусить бути заповнене!',
            'price.string' => 'Данні повинні відповідати десятичному типу!',
        ];
    }
}

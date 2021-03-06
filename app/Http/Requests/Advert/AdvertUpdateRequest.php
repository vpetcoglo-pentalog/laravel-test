<?php

namespace App\Http\Requests\Advert;

use App\Enums\UserTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdvertUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $advert = $this->route('advert');

        return Auth::id() === $advert->user_id || Auth::user()->isAdministrator();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
            'images' => 'nullable|image',
        ];
    }
}

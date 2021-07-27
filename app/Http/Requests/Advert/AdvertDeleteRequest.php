<?php

namespace App\Http\Requests\Advert;

use App\Enums\UserTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdvertDeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $advert = $this->route('advert');

        return Auth::id() === $advert->user_id || Auth::user()->role === UserTypes::ADMIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBoxerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'gym_id'   => 'required|integer|exists:gyms,id',
            'win'      => 'required|integer|min:0',
            'lose'     => 'required|integer|min:0',
            'draw'     => 'required|integer|min:0',
            'titles'    => 'nullable|string|max:255',
            'comment'  => 'nullable|string|max:1000',
            'sns_url'  => 'nullable|string|max:255',
            'pictures' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}

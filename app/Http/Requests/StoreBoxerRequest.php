<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBoxerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $user = Auth::user();

        $this->merge([
            'user_id' => Auth::id(),
        ]);
    }

    public function rules(): array
    {
        return [
            'user_id'  => 'required|integer|exists:users,id',
            'gym_id'   => 'required|integer|exists:gyms,id',
            'win'      => 'required|integer|min:0',
            'lose'     => 'required|integer|min:0',
            'draw'     => 'required|integer|min:0',
            'titles'   => 'nullable|string|max:255',
            'comment'  => 'nullable|string|max:1000',
            'sns_url'  => 'nullable|string|max:255',
            'pictures' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}

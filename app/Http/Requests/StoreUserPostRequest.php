<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUserPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    //バリデーションする前に、今ログインしている人のIDを、リクエストの中に自動で入れている
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => Auth::id(),
        ]);
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'boxer_id' => 'required|exists:boxers,id',
            'title' => 'required|string|max:255',
            'comment' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ];
    }
}

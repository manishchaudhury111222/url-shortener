<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreInvitationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $user = Auth::user();

        if ($user->isSuperAdmin()) {
            return [
                'company_name' => 'required|string',
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
            ];
        }

        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:2,3' // Admin or Member
        ];
    }
}
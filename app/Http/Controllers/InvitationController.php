<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InvitationController extends Controller
{
    public function store(Request $request)
    {
        $currentUser = Auth::user();

        // SCENARIO 1: Super Admin inviting a new Company + Admin
        if ($currentUser->isSuperAdmin()) {
            $request->validate([
                'company_name' => 'required|string',
                'email' => 'required|email|unique:users',
                'name' => 'required|string'
            ]);

            $company = Company::create(['name' => $request->company_name]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('password'),
                'role' => User::ROLE_ADMIN,
                'company_id' => $company->id
            ]);

            return back()->with('success', 'New Client Company & Admin created.');
        }

        // SCENARIO 2: Admin inviting Member/Admin to OWN company
        if ($currentUser->isAdmin()) {
            $request->validate([
                'email' => 'required|email|unique:users',
                'name' => 'required|string',
                'role' => 'required|in:2,3' // Admin or Member
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('password'),
                'role' => $request->role,
                'company_id' => $currentUser->company_id
            ]);

            return back()->with('success', 'Team member invited.');
        }

        abort(403);
    }
}
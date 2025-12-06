<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Url;
use App\Models\Company;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // SCENARIO 1: SUPER ADMIN
        if ($user->isSuperAdmin()) {
            $urls = Url::with(['user', 'company'])->latest()->paginate(10);
            $companies = Company::withCount(['users', 'urls'])->get();
            return view('dashboards.super-admin', compact('urls', 'companies'));
        }

        // SCENARIO 2: COMPANY ADMIN
        if ($user->isAdmin()) {
            $urls = Url::where('company_id', $user->company_id)
                ->with('user')
                ->latest()
                ->paginate(10);
            $team = User::where('company_id', $user->company_id)->get();
            return view('dashboards.client-admin', compact('urls', 'team'));
        }

        // SCENARIO 3: MEMBER
        $urls = Url::where('user_id', $user->id)->latest()->paginate(10);
        return view('dashboards.client-member', compact('urls'));
    }
}
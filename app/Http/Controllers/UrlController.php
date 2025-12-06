<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Url;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        // Requirement: SuperAdmin cannot create short urls
        if ($user->isSuperAdmin()) {
            abort(403, 'Super Admins cannot create short URLs.');
        }

        $request->validate(['original_url' => 'required|url']);

        $code = Str::random(6);

        Url::create([
            'original_url' => $request->original_url,
            'short_code' => $code,
            'user_id' => $user->id,
            'company_id' => $user->company_id,
        ]);

        return redirect()->back()->with('success', 'URL Shortened successfully!');
    }

    public function redirect($code)
    {
        $url = Url::where('short_code', $code)->firstOrFail();
        $url->increment('hits');
        return redirect()->away($url->original_url);
    }
}
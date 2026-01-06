<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(Request $request)
    {
        return response()->json([
            'user' => $request->user()
        ]);
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $validated = $request->validated();

        $request->user()->update($validated);

        return response()->json([
            'message' => 'Профиль обновлен',
            'user' => $request->user()->fresh()
        ]);
    }
}

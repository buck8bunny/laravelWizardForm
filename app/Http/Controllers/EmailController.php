<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class EmailController extends Controller
{
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            return response()->json([
                'message' => 'exists'
            ]);
        } else {
            return response()->json([
                'message' => 'success'
            ]);
        }
    }
}

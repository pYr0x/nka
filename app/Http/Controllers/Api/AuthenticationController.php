<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthenticationController extends Controller {

    public function store(LoginRequest $request): JsonResponse {
        $request->authenticate();

        $token = $request->user()
                         ->createToken("NKA");

        return response()->json(['token' => $token->plainTextToken]);

    }
}

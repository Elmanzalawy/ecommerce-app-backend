<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Dedoc\Scramble\Attributes\BodyParameter;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
    /**
     * Login
     */
    #[BodyParameter('email', description: 'User email address', default: 'test@example.com')]
    #[BodyParameter('password', description: 'User password', default: 'password')]
    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Login successful',
                'data' => [
                    'user' => Auth::user(),
                    'token' => Auth::user()->createToken('auth_token')->plainTextToken,
                ],
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

    }
}

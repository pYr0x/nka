<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\InvalidCredentialsException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $products = Product::all();
        $user = Auth::user();
        $bar = $user->currentAccessToken();
        return response()->json([
                                    'status' => true,
                                    'products' => $products
                                ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        try {
//            new InvalidCredentialsException();

//            $request->authenticate();
//            $foo = $request->validated();
            $validateUser = Validator::make($request->all(),
                                            [
                                                'email' => 'required|email',
                                                'password' => 'required'
                                            ]);

            if($validateUser->fails()){
                return response()->json([
//                                            'status' => false,
//                                            'message' => 'validation error',
                                            'errors' => $validateUser->errors()
                                        ], 401);
            }



            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
//                                            'status' => FALSE,
//                                            'message' => 'Email & Password does not match with our record.',
                                            'errors' => [
                                                'general' => [
                                                    'Invaild credentials'
                                                ]
                                            ]
                                        ], 401);
            } else {
                $user = Auth::user();
                if ($user->tokens->count() > 0) {
                    $user->tokens()
                         ->delete();
                }
                return response()->json([
//                                            'status' => TRUE,
//                                            'message' => 'Successfully logged in',
                                            'token'  => $user->createToken(
                                                "API TOKEN"
                                            )->plainTextToken,
                                        ], 200);

            }

        } catch (\Throwable $th) {
            return response()->json([
                                        'status' => false,
                                        'message' => $th->getMessage()
                                    ], 500);
        }
    }
}

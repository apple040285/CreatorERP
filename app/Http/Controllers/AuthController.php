<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|',
            'c_password' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        if ($user->save()) {
            return response()->json([
                'message' => 'Successfully created user!'
            ], 201);
        } else {
            return response()->json(['error' => 'Provide proper details']);
        }
    }

    public function refreshToken(Request $request)
    {
        // info($request->all());
        // $oClient = \Laravel\Passport\Client::where('password_client', 1)->first();
        // $response = Http::asForm()->post(route('passport.token'), [
        //     'grant_type' => 'refresh_token',
        //     'client_id' => $oClient->id,
        //     'client_secret' => $oClient->secret,
        //     'refresh_token' => $request['refreshToken'] ?? null,
        //     'scope' => '*',
        // ]);
        // if ($response->ok()) {
        //     return response()->json($response->json());
        // }
        // return response()->json(['error' => '非法請求，強制登出請重新嘗試']);


        $oClient = \Laravel\Passport\Client::where('password_client', 1)->first();
        request()->request->add([
            'grant_type' => 'refresh_token',
            'client_id' => $oClient->id,
            'client_secret' => $oClient->secret,
            'refresh_token' => $request['refreshToken'] ?? null,
            'scope' => '*',
        ]);
        $proxy = Request::create('oauth/token', 'POST');
        $response = \Illuminate\Support\Facades\Route::dispatch($proxy);
        $result = json_decode($response->getContent(), true);
        if (isset($result['message'])) {
            switch ($result['error']) {
                case 'invalid_request':
                    return $this->forbidden($result['message']);
                default:
                    return $this->badRequest($result['message']);
            }
        }
        return $this->success($result);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);

        // if (!Auth::attempt($credentials))
        //     return response()->json([
        //         'message' => 'Unauthorized'
        //     ], 401);
        // $user = $request->user();
        // $tokenResult = $user->createToken('Personal Access Token');
        // $token = $tokenResult->token;
        // if ($request->remember_me)
        //     $token->expires_at = Carbon::now()->addWeeks(1);
        // $token->save();
        // return response()->json([
        //     'access_token' => $tokenResult->accessToken,
        //     'token_type' => 'Bearer',
        //     'expires_at' => Carbon::parse(
        //         $tokenResult->token->expires_at
        //     )->toDateTimeString()
        // ]);

        $oClient = \Laravel\Passport\Client::where('password_client', 1)->first();
        request()->request->add([
            'grant_type' => 'password',
            'client_id' => $oClient->id,
            'client_secret' => $oClient->secret,
            'username' => $credentials['email'] ?? null,
            'password' => $credentials['password'] ?? null,
            'scope' => '*',
        ]);
        $proxy = Request::create('oauth/token', 'POST');
        $response = \Illuminate\Support\Facades\Route::dispatch($proxy);
        $result = json_decode($response->getContent(), true);
        if (isset($result['message'])) {
            switch ($result['error']) {
                case 'invalid_grant':
                    return $this->badRequest('帳號或密碼錯誤');
                case 'invalid_client':
                    return $this->badRequest('客戶端認證失敗');
                default:
                    return $this->badRequest($result['message']);
            }
        }
        return $this->success($result);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}

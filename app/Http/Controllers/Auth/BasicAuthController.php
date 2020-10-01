<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\OauthClient;
use App\Models\OauthCode;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasicAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register_grant_client(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $response = [
                'Response' => false,
                'message' => $validator->errors()->first(),
            ];
            return $response;
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'last_login' => date('Y-m-d H:m:s'),
        ]);

        $user->createToken($request['name'])->accessToken;
        
        $key_md5 = Str::random(60);
        $id = Str::random(36);
        $data = OauthClient::updateOrCreate([
            'user_id' => $user->id
        ],[
            'id' => $id,
            'user_id' => $user->id,
            'name' => $request['name'],
            'secret' => md5($key_md5),
            'redirect' => \Request::ip(),
            'personal_access_client' => 1,
            'password_client' => 1,
            'revoked' => 1,
        ]);
        $data->fresh();
        $response = [
            'response' => true,
            'data' => $data,
        ];
        return $response;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user()
    {
        $data = Article::orderBy('id', 'desc')->paginate(10);
        $response = $this->responseSuccess('Successfully', $data, true);
                
        return response()->json($response);
    }
}
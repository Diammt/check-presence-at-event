<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Utils\JsonResponse;
use Illuminate\Support\Facades\Validator;

/**
* @group User managment
*/
class AuthController extends Controller
{
    //const AUTH_TOKEN = 'user-auth-token';
    public function __construct()
    {
        $this->middleware("sanctum.verify", ["only" => ["me", "logout"]]);
    }
    /**
    * Admin or assistant login
    * @bodyParam email string required  The user's mail. Example: admin0@gmail.com
    * @bodyParam password string required  The user's password. Example: adminadmin
    * @response {
    *    "success": true,
    *    "data": {
    *        "access_token": "1|wMUHbjQOLiFWpAugbsELvWIwxwezIoZlbPtazab2",
    *        "token_type": "bearer",
    *        "expires_in": null
    *    },
    *    "error": "",
    *    "code": 200
    *}
    */
    public function dashboardLogin(Request $request)
    {
        $validotor = Validator::make(
                $request->all(),
                [
                    "email" => "required|string",
                    "password" => "required|string",
                ]
            );
        if($validotor->fails()) {
            $response = new JsonResponse();
            $response->fail($validotor->errors());
            return \response()->json($response);
        }
        $user = User::where("email", $request->email)->first();
        if(!$user) {
            $response = new JsonResponse();
            $response->fail(['email' => 'This email is invalid']);
            return response()->json($response);
        }
        if(!Hash::check($request->password, $user->password))  {
            $response = new JsonResponse();
            $response->fail(['password' => 'The password is not correct']);
            return response()->json($response);
        }
        if(!$user->active){
            $response = new JsonResponse();
            $response->fail([
                "lock" => "Your account is no long active"
            ]);
            return response()->json($response);
        }
        $rolesNames = (array) \json_decode($user->getRoleNames());
        $can_logged = ( \in_array(ADMIN, $rolesNames) || \in_array(ASSISTANT, $rolesNames) );
        if(!$can_logged) {
            $response = new JsonResponse();
            $response->fail([
                "rigth" => "Your have not the rigth"
            ]);
            return response()->json($response);
        }
        return $this->login($user);
    }
    /**
    * Client login
    * @bodyParam phone string required  The user's mail. Example:62212121
    * @bodyParam password string required  The user's password. Example: admin
    */
    public function clientLogin(Request $request)
    {
        $user = User::where("phone", $request->phone)->first();
        if(!$user) {
            $response = new JsonResponse();
            $response->fail(['phone' => 'This phone number is invalid']);
            return response()->json($response);
        }
        if(!Hash::check($request->password, $user->password))  {
            $response = new JsonResponse();
            $response->fail(['password' => 'The password is not correct']);
            return response()->json($response);
        }

        return $this->login($user);
    }

    protected function login($user)
    {
        if ($token = $user->createToken(AUTH_TOKEN)->plainTextToken) {
            return $this->respondWithToken($token);
        }

        $response = new JsonResponse();
        $response->fail(['error' => 'Unauthorized']);
        return response()->json( $response );
    }

    protected function respondWithToken($token, $exp=null)
    {
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $exp
            //'expires_in' => $this->guard()->factory()->getTTL()
        ];
        return response()->json(new JsonResponse($data));
    }

    protected function getUserAccess($user)
    {
      // code...
      $user->roleNames = $user->getRoleNames();
      $user->permissionNames = $user->getPermissionNames();
      $user->makeHidden("roles", "permissions");
    }

    /**
    * @authenticated
    * Logout the authenticated user
    * @response {
    *    "success": true,
    *    "data": {
    *        "logout": "User is disconnected successfully"
    *    },
    *    "error": "",
    *    "code": 200
    *}
    */
    public function logout()
    {
        $user = auth()->user();
        //$user->currentAccessToken()->delete();
        $user->tokens()->delete();
        return response()->json( new JsonResponse([
                    "logout" => "User is disconnected successfully"
                ])
            );
    }

    /**
    * Get the authenticated user informations
    * @authenticated
    */
    public function me()
    {

        $user = auth()->user();
        $this->getUserAccess($user);
        return response()->json( new JsonResponse([
                    "user" => $user
                ])
            );
    }
}

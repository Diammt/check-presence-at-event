<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Utils\JsonResponse;

class SanctumMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = new JsonResponse();
        try {
            $user = \auth()->user();
            if(!$user) {
                $response->fail([
                    'login' => [
                        "status" => 1,
                        "message" => "Vous n'êtes pas connecté"
                    ]
                ]);
                return response()->json($response);
            }
            return $next($request);
        } catch (Exception $e) {
            $response->fail([
                'login' => [
                    "status" => 5,
                    "message" => "Une erreur s'est produite",
                ]
            ]);
            return response()->json($response);
        }
    }
}

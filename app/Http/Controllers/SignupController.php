<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signup;
use App\Models\Signup;
use App\rResources\SignupResource;
use App\Utils\JsonResponse;
use Illuminate\Support\Facades\Validator;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signups = SignupResource::collection(Signup::all());
        return \response()->json($signups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function enablePresence($id)
    {
        $validotor = Validator::make(
                [
                    "id" => $id,
                ],
                [
                    "id" => "required|integer",
                ]
            );
        if($validotor->fails()) {
            $response = new JsonResponse();
            $response->fail($validotor->errors());
            return \response()->json($response);
        }

        Signup::where("id", $id)
                ->update([
                    "presence" => true,
                ]);
        $signup = Signup::find($id);
        return \response()->json($signup);
    }

    public function disablePresence($id)
    {
        $validotor = Validator::make(
                [
                    "id" => $id,
                ],
                [
                    "id" => "required|integer",
                ]
            );
        if($validotor->fails()) {
            $response = new JsonResponse();
            $response->fail($validotor->errors());
            return \response()->json($response);
        }

        Signup::where("id", $id)
                ->update([
                    "presence" => false,
                ]);
        $signup = Signup::find($id);
        return \response()->json($signup);
    }
}

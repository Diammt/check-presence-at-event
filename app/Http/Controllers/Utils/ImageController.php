<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a picture
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @bodyParam image file required The user's image, and accept only: jpeg,jpg,png. No-example
     * @response {
     *  "success": true,
     *  "data": {
     *    "image": "jsndsjvkvnddvd.png"
     *  },
     *  "error": "",
     *  "code": 200
     * }
     * @response 400 {
     *  "success": false,
     *  "data": [],
     *  "error": {
     *    "move": "Error lors de l'envoie"
     *  },
     *  "code": 400
     * }
     */
    public function store(Request $request)
    {
      $response = new JsonResponse();
      $validator = Validator::make(
          $request->all(),
          [
            "image" => "required|mimes:jpeg,jpg,png",
          ]
        );
      if($validator->fails()){
        $response->fail($validator->errors());
        return response()->json($response);
      }
      $file = $request->file('image');
      $imageName = time().'.'.$file->getClientOriginalExtension();

      if( !$file->move(public_path('images'), $imageName) ){
        $response->fail([
          "move" => "Error lors de l'envoie"
        ]);
        return response()->json($response);
      }
      $imageName = "/images/".$imageName;

      $response->success([
        "image" => $imageName
      ]);
      return response()->json(new JsonResponse($response));
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
        //
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
}

<?php

namespace App\Http\Controllers;

use App\AlexaRequest;
use App\AlexaResponse;
use App\Computer;
use Illuminate\Http\Request;

class AlexaController extends Controller
{
    public function index(Request $request) {
        $alexaRequest = new AlexaRequest();
        $alexaRequest->data = json_encode($request->all());
        $alexaRequest->save();

        $computer = Computer::find(1);
        $computer->wake();

        $alexaResponse = new AlexaResponse("Okey dokey");
        $alexaRequest->response = json_encode($alexaResponse);

        $alexaRequest->save();

        return response()->json($alexaResponse);
    }
}

<?php

namespace App\Http\Controllers;

use App\AlexaRequest;
use Illuminate\Http\Request;

class AlexaController extends Controller
{
    public function index(Request $request) {
        $alexaRequest = new AlexaRequest();
        $alexaRequest->data = json_encode($request->all());
    }
}

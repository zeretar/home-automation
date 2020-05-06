<?php

namespace App\Http\Controllers;

use App\Computer;
use App\Http\Requests\AddComputerRequest;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index(Computer $computer) {
        return $computer;
    }

    public function wake(Computer $computer) {
        $computer->wake();
    }

    public function add(AddComputerRequest $request) {
        $request->validated();

        $computer = new Computer();
        $computer->name = $request['name'];
        $computer->mac_address = $request['mac_address'];
        $computer->broadcast_address = $request['broadcast_address'];
        $computer->save();

        return $computer;
    }
}

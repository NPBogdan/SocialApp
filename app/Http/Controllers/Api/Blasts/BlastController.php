<?php

namespace App\Http\Controllers\Api\Blasts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blasts\BlastStoreRequest;
use Illuminate\Http\Request;

class BlastController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:sanctum']);
    }

    public function store(BlastStoreRequest $request){
        $request->user()->blasts()->create($request->only('body'));
    }
}

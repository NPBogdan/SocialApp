<?php

namespace App\Http\Controllers\Api\Cronologie;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlastCollection;
use Illuminate\Http\Request;

class CronologieController extends Controller
{
    public function index(Request $request){
        $blasts = $request->user()->blastsFromFollowing()->paginate(3);

        return new BlastCollection($blasts);
    }
}

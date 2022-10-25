<?php

namespace App\Http\Controllers\Api\Media;

use App\Http\Controllers\Controller;
use App\Media\MediaType;
use Illuminate\Http\Request;

class MediaTypesController extends Controller
{
    public function index(){
        return response()->json([
            'data' => [
                'image' => MediaType::$image,
                'video' => MediaType::$video
            ]
        ]);
    }
}

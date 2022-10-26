<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BlastMedia extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function baseMedia(){
        return $this->belongsTo(Media::class,'media_id');
    }
}

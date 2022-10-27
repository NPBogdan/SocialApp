<?php

namespace App\Media;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    public function typeOfMedia(){
        return MediaType::typeOfMedia($this->mime_type);
    }
}

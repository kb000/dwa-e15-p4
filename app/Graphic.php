<?php

namespace Kb0\Vectography;


use Illuminate\Database\Eloquent\Model;

class Graphic extends Model
{

    public function contents() {
        # Graphic has many (past and present) GraphicContents
        # Define a one-to-many relationship.
        return $this->hasMany('Kb0\Vectography\GraphicContent');
    }

    public function currentContent() {
        # Graphic has a single current GraphicContents
        # Use the existing one-to-many relationship, but order and select the first.
        return $this->contents()
                    ->orderBy('created_at', 'desc')
                    ->first();
    }

    public function tags() {
        # Graphic has many tags
        # Define a many-to-many relationship.
        return $this->belongsToMany('Kb0\Vectography\Tag')->withTimestamps();
    }

    public function GetThumbnailDataUri() {
        $raster_data = $this->currentContent()->rasterData;
        return "data:image/png;base64," . base64_encode($raster_data);
    }
}

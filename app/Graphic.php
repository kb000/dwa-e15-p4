<?php

namespace Kb0\Vectography;


use Illuminate\Database\Eloquent\Model;

class Graphic extends Model
{
    public function scopeId($query, $graphic_id) {
        return $query->where('id','=',$graphic_id);
    }

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
        $current_content = $this->currentContent();
        if ($current_content) {
            $raster_data = $current_content->rasterData;
            return "data:image/png;base64," . base64_encode($raster_data);
        } else {
            return "/img/no-image-placeholder.png";
        }
    }
}

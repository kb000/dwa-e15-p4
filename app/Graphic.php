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

    public function tags() {
        # Graphic has many tags
        # Define a many-to-many relationship.
        return $this->belongsToMany('Kb0\Vectography\Tag')->withTimestamps();
    }

    public function GetThumbnailDataUri() {
        $current_content = $this->contents->first();
        return "data:image/png;base64," . base64_encode($current_content->rasterData);
    }

    public function ScopeCurrentContent() {
        return $this->contents->first();
    }
}

<?php

namespace Kb0\Vectography;

use Illuminate\Database\Eloquent\Model;

class GraphicContent extends Model
{
    public function graphic() {
        # GraphicContent belongs to Graphic
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('Kb0\Vectography\Graphic');
    }
}

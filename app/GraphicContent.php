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

    public function scopeCurrent($query) {
        return $query->orderBy('created_at')->limit('1');
    }
}

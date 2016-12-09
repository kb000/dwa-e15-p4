<?php

namespace Kb0\Vectography;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function graphics() {
        # Tag has many graphics
        # Define a many-to-many relationship.
        return $this->belongsToMany('Kb0\Vectography\Graphic')->withTimestamps();
    }
}

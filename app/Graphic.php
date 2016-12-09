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
}

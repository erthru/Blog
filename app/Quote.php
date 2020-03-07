<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ["quote", "writer_id"];

    public function writer()
    {
        return $this->belongsTo("App\Writer", "writer_id", "id");
    }
}

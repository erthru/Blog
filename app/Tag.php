<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ["name", "content_id"];

    public function content()
    {
        return $this->belongsTo("App\Content", "content_id", "id");
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ["title", "body", "thumb", "is_page", "view", "for_url","writer_id"];

    public function writer()
    {
        return $this->belongsTo("App\Writer", "writer_id", "id");
    }

    public function tag()
    {
        return $this->hasMany("App\Tag", "content_id", "id");
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $fillable = ["full_name", "bio", "avatar"];

    public function content()
    {
        return $this->hasMany("App\Content", "writer_id", "id");
    }

    public function quote()
    {
        return $this->hasMany("App\Quote", "writer_id", "id");
    }

    public function credential()
    {
        return $this->hasOne("App\Credential");
    }
}

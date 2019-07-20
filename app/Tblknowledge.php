<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblknowledge extends Model
{
    protected $table = "tblknowledge";

    public function child()
    {
        return $this->hasMany('App\TblknowledgeChild', 'knowledge_id', 'id');
    }
}

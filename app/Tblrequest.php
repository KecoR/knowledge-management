<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblrequest extends Model
{
    protected $table = "tblrequest";

    public function kategori()
    {
        return $this->belongsTo('App\Tblknowledge', 'knowledge_parent_id', 'id');
    }

    public function child()
    {
        return $this->belongsTo('App\TblknowledgeChild', 'knowledge_child_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblknowledgeContent extends Model
{
    protected $table = "tblknowledge_content";

    public function info()
    {
        return $this->belongsTo('App\TblknowledgeInfo', 'info_id', 'id');
    }
}

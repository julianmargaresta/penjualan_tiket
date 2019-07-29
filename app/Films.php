<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Films extends Model
{
    use SoftDeletes;
    //ambil database/inisialisasi nama database
    protected $table = 'films';

    public function genres()
    {
    	return $this->hasOne(Genres::class,'id', 'genre_id')->withTrashed();
    }

    public function studios()
    {
    	return $this->hasOne(Studios::class,'id', 'studio_id')->withTrashed();
    }
}

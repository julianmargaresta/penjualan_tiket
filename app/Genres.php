<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genres extends Model
{
    //
    use SoftDeletes;
    //ambil database/inisialisasi nama database
    protected $table = 'genres';

    public function films()
    {
    	return $this->hasMany(Films::class, 'genre_id','id');
    }

    public function delete()
    {
    	$this->films()->delete();
    	return parent::delete();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Studios extends Model
{
    //
    //
    use SoftDeletes;
    //ambil database/inisialisasi nama database
    protected $table = 'studios';

    public function films()
    {
    	return $this->hasMany(Films::class, 'studio_id','id');
    }

    public function delete()
    {
    	$this->films()->delete();
    	return parent::delete();
    }
}

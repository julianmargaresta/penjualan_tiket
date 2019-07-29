<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Orders extends Model
{
    //
    use SoftDeletes;
    protected $table = 'orders';

    public function user()
    {
    	return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function films()
    {
    	return $this->hasOne(Films::class, "id","film_id");
    }
}

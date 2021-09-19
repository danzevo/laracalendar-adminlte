<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table="City";
	public $timestamps = false;

    public function userCreated()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
	}

    public function userModified()
    {
        return $this->hasOne('App\Models\User', 'id', 'last_modified_by');
	}
}

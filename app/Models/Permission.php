<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];

    public function search ($filter = null) {
        return $this->where('name', 'LIKE', "%$filter%")->orWhere('Description', 'LIKE', "%$filter%")->paginate(1);
    }

    public function profiles () {
        return $this->belongsToMany(Profile::class);
    }
}

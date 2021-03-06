<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    public function search($filter = null) {
        return $this->where('name', 'LIKE', "%{$filter}%")
            ->orWhere('description', 'LIKE', "%{$filter}%")
            ->paginate(1);
    }

    public function permissions () {
        return $this->belongsToMany(Permission::class);
    }

    public function plans () {
        return $this->belongsToMany(Plan::class);
    }

    public function permissionsAvailable () {
        return Permission::whereNotIn('id', $this->permissions()->get()->pluck('id'));
    }

    public function searchPermissions ($query, $filter = null) {
        return $query->where('name', 'LIKE', "%{$filter}%");
    }

    public function plansAvailable () {
        return Plan::whereNotIn('id', $this->plans()->get()->pluck('id'));
    }

    public function searchPlans ($query, $filter = null) {
        return $query->where('name', 'LIKE', "%{$filter}%");
    }
}

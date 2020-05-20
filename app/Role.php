<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    public $timestamps = false;

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'created_at',
        'updated_at'
    ];
}

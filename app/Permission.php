<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
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

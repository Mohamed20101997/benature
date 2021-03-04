<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Laratrust\Traits\LaratrustAdminTrait;

class Admin extends Authenticatable
{
    use LaratrustAdminTrait;

    protected $table="admins" ;
    protected $guarded = [];
    public $timestamps = true;

}

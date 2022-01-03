<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ROLE_ADMIN = 99;
    const ROLE_REVIEW_MANAGER = 5;
    const ROLE_ACCOUNT = 1;


    protected $fillable = [
        'name', 'email', 'password','login','role','pay_status','pay_to'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public $pay_statuses = [
        0=>'Базовый',
        1=>'Подписка',
        2=>'На модерации',
    ];

    public function isReviewManager()
    {
        return $this->role == self::ROLE_REVIEW_MANAGER;
    }
    public function isAdmin()
    {
        return $this->role == self::ROLE_ADMIN;
    }
    public function hasAccess($routeName = null)
    {
        if($this->isAdmin()) {
            return true;
        }
        $resources = config('acl')[$this->role];
        return isset($resources[$routeName]);
    }
}

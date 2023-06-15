<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Database\factories\RoleFactory;
use Modules\Auth\Enums\RoleEnum;

class Role extends Model
{
use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = false;
    protected $casts = [
        'name' => RoleEnum::class
    ];
    protected static function newFactory(): RoleFactory
    {
        return RoleFactory::new();
    }
}

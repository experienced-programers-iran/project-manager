<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Project\Database\factories\ProjectFactory;
use Modules\Project\Enums\ProjectStatusEnums;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description'
    ];

    protected $casts = [
        'status' => ProjectStatusEnums::class
    ];

    public function projectDetail(): HasOne
    {
        return $this->hasOne(ProjectDetail::class);
    }

    public function projectOwners(): HasMany
    {
        return $this->hasMany(ProjectOwner::class);
    }

    protected static function newFactory(): ProjectFactory
    {
        return ProjectFactory::new();
    }
}

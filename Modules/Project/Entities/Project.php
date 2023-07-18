<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Auth\Entities\User;
use Modules\Project\Database\factories\ProjectFactory;
use Modules\Project\Enums\ProjectStatusEnums;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description' ,
        'status'
    ];

    protected $casts = [
        'status' => ProjectStatusEnums::class
    ];

    public function detail(): HasOne
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

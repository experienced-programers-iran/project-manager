<?php

namespace Modules\Organization\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Auth\Entities\User;
use Modules\Organization\Database\factories\OrganizationFactory;
use Modules\Project\Entities\Project;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo',
    ];

    protected static function newFactory(): OrganizationFactory
    {
        return OrganizationFactory::new();
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}

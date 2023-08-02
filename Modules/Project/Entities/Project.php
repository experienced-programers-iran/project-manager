<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Organization\Entities\Organization;
use Modules\Project\Database\factories\ProjectFactory;
use Modules\Project\Enums\ProjectStatusEnums;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'organization_id',
        'status',
    ];

    protected $casts = [
        'status' => ProjectStatusEnums::class,
    ];

    public function projectDetail(): HasOne
    {
        return $this->hasOne(ProjectDetail::class);
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    protected static function newFactory(): ProjectFactory
    {
        return ProjectFactory::new();
    }
}

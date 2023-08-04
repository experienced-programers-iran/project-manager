<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Project\Database\factories\ProjectDetailFactory;

class ProjectDetail extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'end_date', 'start_date', 'budget'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    protected static function newFactory(): ProjectDetailFactory
    {
        return ProjectDetailFactory::new();
    }
}

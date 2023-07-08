<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Auth\Entities\User;
use Modules\Project\Database\factories\ProjectOwnerFactory;

class ProjectOwner extends Model
{
    use HasFactory;

    protected $fillable = ['transferred_at'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function previousOwner(): BelongsTo
    {
        return $this->belongsTo(User::class,'previous_owner_id');
    }
    public function newOwner(): BelongsTo
    {
        return $this->belongsTo(User::class,'new_owner_id');
    }

    protected static function newFactory(): ProjectOwnerFactory
    {
        return ProjectOwnerFactory::new();
    }
}

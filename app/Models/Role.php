<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    protected $appends = ['display_name'];

    public function getDisplayNameAttribute(): string
    {
        // Convert 'role-name' to 'Role Name'
        return collect(explode('-', $this->name))
            ->map(fn($word) => ucfirst($word))
            ->join(' ');
    }
}

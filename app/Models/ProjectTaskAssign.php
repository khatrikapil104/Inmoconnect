<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTaskAssign extends Model
{
    use HasFactory;

    public function assignTo()
    {
        return $this->hasOne(User::class, 'id', 'assign_to');
    }
    public function assignBy()
    {
        return $this->hasOne(User::class, 'id', 'assign_by');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rejectproposals extends Model
{
    use HasFactory;
    protected $table = 'reject_proposals';

    protected $fillable = [
        'reason',
        'agent_id',
        'project_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class,'agent_id','id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id','id');
    }
}

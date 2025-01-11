<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    // Specify the table if it doesn't follow Laravel's plural convention
    protected $table = 'commissions';

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'commission',
        'percentage',
        'total_commission',
        'agreement_start_date',
        'agreement_end_date',
        'additional_note',
        'owner_id',
        'secondaryagent_id',
        'customer_id',
        'project_id',
        'property_id'
    ];

    // Define relationships (optional, but useful)
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function secondaryAgent()
    {
        return $this->belongsTo(User::class, 'secondaryagent_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}

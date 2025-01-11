<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInquiry extends Model
{
    use HasFactory;

    // Define table name if it does not follow Laravel's naming convention
    protected $table = 'customer_inquiries';

    // Define fillable fields
    protected $fillable = [
        'owner_id',
        'agent_id',
        'property_id',
        'customer_id',
    ];

    /**
     * Get the owner associated with the inquiry.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Get the agent associated with the inquiry.
     */
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    /**
     * Get the property associated with the inquiry.
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Get the customer associated with the inquiry.
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}

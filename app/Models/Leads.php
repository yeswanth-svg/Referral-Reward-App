<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;

    protected $table = "leads";

    protected $primaryKey = 'lead_id'; // Define your primary key
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'project_type',
        'referral_code',
        'user_id',
        'status',
    ];

    // Define the relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Assuming 'user_id' is the foreign key
    }
}

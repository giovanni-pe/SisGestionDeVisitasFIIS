<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorRepresentative extends Model
{
    protected $fillable = ['user_id', 'identification', 'phone'];

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with Requests
     */
    public function requests()
    {
        return $this->hasMany(Request::class, 'representative_id', 'id');
    }
}

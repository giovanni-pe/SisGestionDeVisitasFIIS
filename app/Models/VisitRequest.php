<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitRequest extends Model
{
    protected $fillable = ['representative_id', 'request_type', 'request_reason', 'requested_date', 'visitor_count', 'status'];

    /**
     * Relationship with VisitorRepresentative
     */
    public function representative()
    {
        return $this->belongsTo(VisitorRepresentative::class, 'representative_id', 'id');
    }

    /**
     * Relationship with Calendar
     */
    public function calendar()
    {
        return $this->hasOne(Calendar::class);
    }
}

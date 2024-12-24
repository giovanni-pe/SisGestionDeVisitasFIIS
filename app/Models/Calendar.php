<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = ['request_id', 'event_type', 'title', 'start', 'end'];

    /**
     * Relationship with Requests.
     */
    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id', 'id');
    }
}

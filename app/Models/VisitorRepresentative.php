<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorRepresentative extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'identification',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visitRequests()
    {
        return $this->hasMany(VisitRequest::class,'representative_id');
    }
}

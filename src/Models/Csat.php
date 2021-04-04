<?php
namespace Rlc\Csat\Models;

use Illuminate\Database\Eloquent\Model;

class Csat extends Model
{
    protected $fillable = [
        'first_name', 
        'middle_name', 
        'last_name', 
        'email', 
        'rating', 
        'score', 
        'comment', 
        'location', 
        'ip_address'
    ];
}
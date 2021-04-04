<?php
namespace Rlc\Csat\Models;

use Illuminate\Database\Eloquent\Model;

class CsatConfig extends Model
{
    protected $fillable = [
        'enabled',
        'link',
        'target',
        'class',
        'align',
        'top',
        'minutes',
        'images',
        'alt',
        'height',
        'width',
        'bgcolor',
        'question',
        'message',
        'deny',
        'allow'
    ];

}
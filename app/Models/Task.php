<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable= [
        'title',
        'description',
    ];
     //Relacion belongsTo, osea una tarea le pertenece a un usuario
     public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}

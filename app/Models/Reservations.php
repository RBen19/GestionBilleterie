<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Concerns\Events;

class Reservations extends Model
{
    use HasFactory;

    //
    protected $table = 'reservations';
    protected $fillable = ['name'];

    public function evenement(){
        return $this->belongsTo(Evenement::class);
    }
}

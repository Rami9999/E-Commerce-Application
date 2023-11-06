<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reply;
class Contact extends Model
{
    use HasFactory;
    protected $table='contacts';
    public function reply()
    {
        return $this->hasOne(Reply::class);
    }
}

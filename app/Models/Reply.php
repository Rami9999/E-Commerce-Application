<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;
class Reply extends Model
{
    use HasFactory;
    protected $table='replies';
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}

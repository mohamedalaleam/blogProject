<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;
    protected $table='Contact';



    static public function getcontact()
    {
        return self::select('Contact.*')->get(); ;
    }
    static public function getSingle($id)
    {
      return self::find($id);
    }
}

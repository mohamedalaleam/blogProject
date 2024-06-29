<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    use HasFactory;
    protected $table='page';
    static public function getSingle($id)
    {
    return self::find($id);
    }
    static public function getRecord()
    {
      return self::get();
    }
    static public function getSlug($slug)
    {
      return self::where('slug', '=', $slug)->first();
    }
}

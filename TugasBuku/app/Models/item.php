<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $fillable = ["name","qty","price","item_type_id"]; 
    public function itemType(){
        return $this->belongsTo(ItemType::class); 
    }

}

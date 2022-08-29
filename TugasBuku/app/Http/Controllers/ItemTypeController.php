<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    public function index() {
        $type = ItemType::paginate(3);
        return view("ItemTypes.index",["ItemTypes"=>$type]);
    }
}

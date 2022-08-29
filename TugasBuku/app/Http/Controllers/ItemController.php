<?php

namespace App\Http\Controllers;

use id;

use App\Models\Item;
use App\Models\ItemType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        // $items=DB::table("items")
        // ->join("item_types","item.item_type_id","=", "item_types.id")
        // ->select("items.*", "item_types.name as jenis")
        // ->paginate();
        // $item=Item::paginate();
        

        // $items=DB::table("items")
        // ->join("item_types","item.item_type_id","=", "item_types.id")
        // ->select(\DB::raw("items.id, items.name, items.qty,items.price(items.qty*items.price)as jumlah"))
        // ->paginate();
        $item=Item::paginate(3);

        return view("items.index", ["items" => $item]);
    }

    public function create() {
        $itemTypes = ItemType::get();
        return view("items.create", ["ItemTypes"=>ItemType::get()]);
    }

    public function store(Request $request) {
        $items = Item::create([
            "item_type_id"=> $request->Item_Type_Id,
            "name" => $request->name,
            "qty" => $request->qty,
            "price" => $request->price,
        ]);

   

        return redirect("/");
    }

    public function edit($id) {
        $item = Item::findOrFail($id);
        $itemTypes=ItemType::get();

        return view("items.edit", compact("item", "itemTypes"));
    }

    public function update(Request $request, $id) {
        $item = Item::findOrFail($id);
        $item -> update([
            "item_type-id" => $request->item_type_id ?? $item->item_type_id,
            "name" => $request->name ?? $item->name,
            "qty" => $request->qty ?? $item->qty,
            "price" => $request->price ?? $item->price,
        ]);

        return redirect("/");
    }

    public function destroy($id) {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect("/");
    }
}

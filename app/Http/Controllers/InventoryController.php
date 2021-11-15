<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function show(){

        $items = DB::table('items')
            ->join('inventory', function($join) {
                $join->on('items.id', '=', 'inventory.item_id')
                    ->where('inventory.user_id', '=', Auth::id());
            })
            ->get();

        return view('inventory', [
            'items' => $items
        ]);
    }
}

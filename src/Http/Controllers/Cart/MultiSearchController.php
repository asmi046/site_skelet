<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\ProductGroup;
use App\Models\Category;

class MultiSearchController extends Controller
{
    public function index(Request $request) {
        $squery = $request->input('squery');
        $products = ProductGroup::where('title', 'LIKE', "%".$squery."%")->take(30)->get();
        $category = Category::where('name', 'LIKE', "%".$squery."%")->take(30)->get();
        return response()->json([
            'category' => $category,
            'product' => $products
        ]);
    }
}

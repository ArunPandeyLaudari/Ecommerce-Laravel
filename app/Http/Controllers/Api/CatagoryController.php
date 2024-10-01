<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{

    public function index()
    {
        return response()->json('Category fetched successfully');
        $categories = Category::orderBy('priority')->get();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'Categories fetched successfully',
                'data' => $categories
            ]
        );
    }
}

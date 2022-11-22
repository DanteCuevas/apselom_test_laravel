<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function indexJson ()
    {
        $categories = Category::pluck('name', 'id');
        $response = [
            'message'   => 'Get categoires success',
            'success'   => true,
            'data'      => [
                'categories' => $categories
            ]
        ];
        return $response;
    }
}

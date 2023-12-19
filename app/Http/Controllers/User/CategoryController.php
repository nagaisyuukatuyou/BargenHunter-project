<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function index(): View
    {   
        //カテゴリ一覧全件取得
        $categories = Category::all();
        $category_id = Category::select('id')->get();
        $images = Category::select('image')->get();
        
        return view('index', [
            'categories' => $categories,
            'category_id' => $category_id,
            'images' => $images,
        ]);
    }

    public function getCategory(string $id){
        
            $category = Category::findOrFail($id);

            return $category;
    }
}

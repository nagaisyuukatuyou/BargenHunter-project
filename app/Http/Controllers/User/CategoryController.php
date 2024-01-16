<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Supermarket;
use App\Models\SupermarketDetail;
use App\Models\Price;

class CategoryController extends Controller
{
    //
    public function index(): View
    {
        //カテゴリ一覧全件取得
        $categories = Category::query()->get();//all();
        $category_id = Category::select('id')->get();
        $images = Category::select('image')->get();

        return view('index', [
            'categories' => $categories,
            'category_id' => $category_id,
            'images' => $images,
        ]);
    }

    public function getCategory(string $id)
    {
        //カテゴリ1件取得
        $category = Category::findOrFail($id);

        return $category;
    }

    public function getProducts(string $category_id): View

    {   
        //商品テーブルの指定のカテゴリIDと一致するデータを全件取得
        $products = Product::select('*')->where('category_id', $category_id)->get();
        //指定のカテゴリIDとカテゴリテーブルのIDが一致するデータを取得する
        $category = $this->getCategory($category_id);

        return view('products', [
            'products' => $products,
            'category' => $category,
        ]);
    }

    public function getResults(string $product_id)
    {
        //スーパーマーケットテーブル、価格テーブル、スーパー詳細テーブルを結合し、以下のIDと一致するカラムを全件取得

        /*$sql = DB::table('prices')
        ->join('supermarkets', 'prices.supermarket_id', '=', 'supermarkets.id')
        ->join('supermarket_details', 'supermarkets.id', '=', 'supermarket_details.supermarket_id')
        ->select('prices.*', 'supermarkets.*', 'supermarket_details.*')
        ->where('prices.product_id', '=', $product_id)
        ->orderBy('price');*/

        $sql = Price::query()
        ->join('supermarkets', 'prices.supermarket_id', '=', 'supermarkets.id')
        ->join('supermarket_details', 'supermarkets.id', '=', 'supermarket_details.supermarket_id')
        ->where('prices.product_id', '=', $product_id)
        ->orderBy('price');


        $results = $sql->get();
        $minresult = $sql->limit(1)->first();

        return [$results, $minresult];
    }

    //カテゴリテーブルと商品テーブルを操作するため、変数は2つ設定する

    public function getPrices(string $category_id, string $product_id, Request $request): View
    {   
        //商品テーブルに格納されている画像名をproduct_idと一致したものを取得する
        $img_name = Product::select('image', 'product_name')->where('id', $product_id)->first();

        $keyword = $request->input('keyword');

        $sql = Price::query()
        ->join('supermarkets', 'prices.supermarket_id', '=', 'supermarkets.id')
        ->join('supermarket_details', 'supermarkets.id', '=', 'supermarket_details.supermarket_id')
        ->where('prices.product_id', '=', $product_id)
        ->orderBy('price');

        $product = $sql->first();
        $results = $this->getResults($product_id);

        $Results = $results[0];

          //カテゴリIDと一致するカラムの情報を取得
          $category = $this->getCategory($category_id);
          $Minresult = $results[1];
          $count = count($Results);

        if(!empty($keyword)) {
            $sql->where('s_name', 'like', "%{$keyword}%");
            $Results = $sql->get();
            $count = count($Results);
            $keyword = $keyword;
            
        }
        else{
            $keyword = '';
        }
        
        return view('results', [
           'img_name' => $img_name,
           'results' => $Results,
           'minresult' => $Minresult,
           'count' => $count,
           'category' => $category,
           'product' => $product,
           'keyword' => $keyword,
        ]);

    }

    //public function 

}
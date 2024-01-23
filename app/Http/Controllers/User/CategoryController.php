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
use LDAP\Result;

class CategoryController extends Controller
{
    //
    public function index(Request $request): View
    {
        //検索ワードを格納
        $keyword = $request->input('keyword');

        //カテゴリ一覧全件取得

        $sql = Category::query();//all();

        //検索欄が空でない場合は、入力された検索ワードとcategoriesテーブルの"title"または"sub_title"と照合する
        //sql文を追加する
        if(!empty($keyword)) {
            $sql->where('title', 'like', "%{$keyword}%")
            ->orWhere('sub_title', 'like', "%{$keyword}%");
        }

        //データ取得
        $categories = $sql->get();
        //カテゴリIDを全件取得

        $category_id = Category::select('id')->get();
        //画像を全件取得
        $images = Category::select('image')->get();

        return view('index', [
            'categories' => $categories,
            'keyword' => $keyword,
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

        $sql = Price::query()
            ->join('supermarkets', 'prices.supermarket_id', '=', 'supermarkets.id')
            ->join('supermarket_details', 'supermarkets.id', '=', 'supermarket_details.supermarket_id')
            ->where('prices.product_id', '=', $product_id)
            ->orderBy('price');


        $results = $sql->get();
        $minresult = $sql->limit(1)->first();
        $product = $sql->first();

        return [$results, $minresult, $product];
    }

    //カテゴリテーブルと商品テーブルを操作するため、変数は2つ設定する

    public function getPrices(string $category_id, string $product_id, Request $request): View
    {
        //商品テーブルに格納されている画像名をproduct_idと一致したものを取得する
        $img_name = Product::select('image', 'product_name')->where('id', $product_id)->first();

        $keyword = $request->input('keyword');

        //getResults関数を呼び出し、値を取得する。
        $results = $this->getResults($product_id);

        //値を全て取得
        $Results = $results[0];
        //最安値を取得
        $Minresult = $results[1];
        //取得したデータの数をカウントして取得
        $count = count($Results);
        //商品IDを取得
        $product = $results[2];

        $sql = Price::query()
            ->join('supermarkets', 'prices.supermarket_id', '=', 'supermarkets.id')
            ->join('supermarket_details', 'supermarkets.id', '=', 'supermarket_details.supermarket_id')
            ->where('prices.product_id', '=', $product_id)
            ->orderBy('price');

        //検索機能を実行した場合、以下のifによりスーパーの名前、所在地、最寄り駅より検索される。
        if (!empty($keyword)) {
            
            $sql->where('s_name', 'like', "%{$keyword}%")
                ->orwhere('address', 'like', "%{$keyword}%")
                ->where('prices.product_id', $product_id)
                ->orwhere('nearest_station', 'like', "%{$keyword}%")
                ->where('prices.product_id', $product_id);            
            //$keyword = $keyword;
            $Results = $sql->get();
            $count = count($Results);
        }

        //カテゴリIDと一致するカラムの情報を取得
        $category = $this->getCategory($category_id);
        


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

    //public function tttt

}
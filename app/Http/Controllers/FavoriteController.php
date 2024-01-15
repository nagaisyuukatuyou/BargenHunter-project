<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FavoriteRequest;

class FavoriteController extends Controller
{
    //お気に入り登録
    public function insert(FavoriteRequest $request)
    {
        $supermarket_id = $request->supermarket_id;
        $userId = Auth::id();

        //dd($supermarket_id, $userId);
        $user = User::find($userId);
        //dd($supermarket_id, $userId, $user);
        $user->supermarkets()->attach($supermarket_id);

        return redirect()->route('favoriteView');
    }

    //お気に入り削除
    public function delete(Request $request)
    {
        $supermarket_id = $request->supermarket_id;
        $userId = Auth::id();

        $user = User::find($userId);
        $user->supermarkets()->detach($supermarket_id);

        return redirect()->route('favoriteView');

    }

    //お気に入りデータ取得
    public function select()
    {

        $userId = Auth::id();
        $user = User::find($userId);


        foreach ($user->supermarkets as $supermarket) {

            $results[] = $this->getResults($supermarket->pivot->supermarket_id);

        }


        if (!empty($results)) {


            $results = $this->convert($results);
            return view('mypage.favorite', ['results' => $results]);

        } else {

            echo 'なし';

        }

    }

    //supermarketsテーブル、supermarket_detailsテーブルを結合
    public function getResults(string $supermarket_id)
    {

        $results = DB::table('supermarkets')
            ->join('supermarket_details', 'supermarkets.id', '=', 'supermarket_details.supermarket_id')
            ->select('supermarkets.*', 'supermarket_details.*')
            ->where('id', '=', $supermarket_id)
            ->get();

        return $results;
    }

    //多次元配列の階層を繰り上げ
    public function convert($results)
    {

        for ($i = 0; $i < count($results); $i++) {
            $c_results[] = $results[$i][0];
        }

        return $c_results;

    }
}
<?php

namespace App\Http\Controllers;

use App\Ads;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $param = $request->all();

        $search = '';
        $page   = 1;
        $countPerPage = 5;

        if (isset($param['query']) && !empty($param['query'])) {
            $search = $param['query'];
        }

        if (isset($param['page']) && !empty($param['page'])) {
            $page = $param['page'];
        }

        if (isset($param['page']) && $param['page']<= 0) {
            $page = 1;
        }

        $results = Ads::search($search);
        // dd($results);
        return view('ads.search-results', ['ads' => $results]);
    }
}

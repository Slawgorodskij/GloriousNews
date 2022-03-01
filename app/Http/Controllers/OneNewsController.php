<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class OneNewsController extends Controller
{
    public function oneNews($idNews)
    {
        $dataNews = News::dataNews($idNews);

        return view('oneNews', [
            'news' => $dataNews[0],
            'comment' => $dataNews,
        ]);
    }
}

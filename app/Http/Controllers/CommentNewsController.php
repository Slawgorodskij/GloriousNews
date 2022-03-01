<?php

namespace App\Http\Controllers;


use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use App\Models\News;


class CommentNewsController extends Controller
{
    public function showForm($newsID)
    {
        $news = News::find($newsID);

        return view('comment', [
            'title' => "Мнение о статье {$news->title}",
            'news_id' => $newsID,
        ]);
    }


    public function comment(CommentFormRequest $request)
    {
        Comment::createComment($request);

        return redirect(route('one_news', $request['news_id']));
    }
}

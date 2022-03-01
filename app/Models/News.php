<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'news_body',
        'source',
        'image',
        'publish_date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at');
    }

    public static function dataNews($idNews)
    {
        return DB::table('news')
            ->leftJoin('comments', 'news.id', '=', 'comments.news_id')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('news.id', 'news.title', 'news.description', 'news.news_body', 'news.category_id', 'comments.comment_body', 'comments.created_at', 'users.name')
            ->where('news.id', '=', $idNews)
            ->get();
    }

    public static function addNews($data)
    {
        $categoryId = Category::query()
            ->where('title', $data['channel_title'])
            ->value('id');
        foreach ($data['news'] as $news) {
            $newsTitle = News::query()
                ->where('title', $news['title'])
                ->first();
            if (is_null($newsTitle)) {
                News::create([
                    'category_id' => $categoryId,
                    'title' => $news['title'],
                    'description' => $news['description'],
                    'source' => $news['link'],
                ]);
            }
        }
        return true;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'news_id',
        'comment_body',
    ];

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function createComment($data)
    {
        $userId = auth()->user()->id;
        self::create([
            'user_id' => $userId,
            'news_id' => $data['news_id'],
            'comment_body' => $data['comment_body'],
        ]);
    }
}

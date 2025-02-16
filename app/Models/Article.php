<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'tag_id', 'title', 'content'];

    //Relación 1:N con Users
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    //Relación 1:N con Tags
    public function tag():BelongsTo{
        return $this->belongsTo(Tag::class);
    }
}

<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'title',
        'group',
        'link',
        'bookmark_group'

    ];

    public function bGroup(): BelongsTo
    {
        return $this->belongsTo(BookmarkGroup::class);
    }

    //protected $hidden=[];
}

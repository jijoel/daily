<?php namespace Days\Day056;

use Auth;
use Eloquent;
use Days\Support\DateRange;


class Day056Tag extends Eloquent
{
    protected $table = 'day056_tags';
    protected $fillable = ['title'];

    public static $rules = array(
        'title' => 'required|max:80',
    );


    public function add($text)
    {
        $found = $this->where('title', $text)->first();
        if ($found)
            return $found;

        $tag = new Day056Tag;
        $tag->title = $text;
        $tag->save();
        
        return $tag;
    }

// Mutators and Accessors -----------------------------------------------------


// Relationships --------------------------------------------------------------

    public function articles()
    {
        return $this->belongsToMany(
            'Days\Day056\Day056Blog', 
            'day056_article_tags',
            'tag_id',
            'article_id'
        );
    }

}

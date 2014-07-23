<?php namespace Days\Day056;

use Auth;
use Eloquent;
use Days\Support\DateRange;


class Day056Blog extends Eloquent
{
    protected $table = 'day055_blog';
    protected $fillable = ['author_id','title','text'];

    public static $rules = array(
        'title' => 'required|max:80',
        'text'  => 'required',
    );


// Mutators and Accessors -----------------------------------------------------

    public function getDateAttribute()
    {
        return new DateRange($this->created_at);
    }

    public function getAuthorNameAttribute()
    {
        return ($this->author) ? $this->author->username : '(unknown)';
    }

    public function getTeaserAttribute()
    {
        return strip_tags($this->firstXChars($this->attributes['text']),60);
    }

    private function firstXChars($string, $chars = 100)
    {
        preg_match('/^.{0,' . $chars. '}(?:.*?)\b/iu', $string, $matches);
        return $matches[0];
    }


    // This, particularly, really shouldn't be in the model.
    // Note that it is tied to a particular route.. bad!
    // It means we won't be able to use it elsewhere.
    // It should be in a presenter.
    public function getLinkAttribute()
    {
        $route = (Auth::check()) ? 'edit' : 'show';

        return '<a href="'.route('day056.'.$route, $this->id).'">'
            . $this->title . '</a>';
    }

// Relationships --------------------------------------------------------------

    public function author()
    {
        return $this->belongsTo('User', 'author_id');
    }

    public function tags()
    {
        return $this->belongsToMany(
            'Days\Day056\Day056Tag', 
            'day056_article_tags',
            'article_id',
            'tag_id'
        );
    }

}

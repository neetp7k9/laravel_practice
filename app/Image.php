<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Image extends Model  implements StaplerableInterface 
{
    //
    use EloquentTrait;

    // Add the 'avatar' attachment to the fillable array so that it's mass-assignable on this model.
    protected $fillable = ['avatar', 'first_name', 'last_name'];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('avatar', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100'
            ]
        ]);

        parent::__construct($attributes);

    }
    public function comments()
    {
        return $this->hasMany('Comment');
    }
    public function user()
    {
        return $this->belongsTo('User');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Content;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Topic extends Model implements StaplerableInterface {

    use EloquentTrait;

    use Sluggable;

    public $table = "topics";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
    'id',
		'name',
		'description',
		'body',
		'user_id',
		'status',
    'sticky',
    'foto',
    'slug'
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('foto', [
            'styles' => [
                'medium' => '540x360#',
                'small' => '270x180#',
                'thumb' => '135x90#' ],
            'url' => '/upload/topic/:attachment/:id/:style/:filename',
            'default_url' => '/img/missing.jpg'
        ]);

        parent::__construct($attributes);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static $rules = [
        // create rules
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
    // Topic

}

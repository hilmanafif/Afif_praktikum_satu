<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Content;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model implements StaplerableInterface {

    use EloquentTrait;

    use Sluggable;

    public $table = "categories";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'description',
		'body',
    'foto',
    'slug'
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('foto', [
            'styles' => [
                'medium' => '540x360#',
                'small' => '270x180#',
                'thumb' => '135x90#' ],
            'url' => '/upload/category/:attachment/:id/:style/:filename',
            'default_url' => '/img/missing.jpg'
        ]);

        parent::__construct($attributes);
    }

    public static $rules = [
        // create rules
    ];

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

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    // Category

}

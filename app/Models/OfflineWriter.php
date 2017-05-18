<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Content;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Offlinewriter extends Model implements StaplerableInterface {

    use EloquentTrait;

    use Sluggable;

    public $table = "offlinewriters";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
    'id',
		'name',
		'description',
		'twitter',
		'email',
		'phone',
    'avatar',
    'slug',
    'status'
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('avatar', [
            'styles' => [
                'medium' => '300x300#',
                'small' => '128x128#',
                'thumb' => '64x64#' ],
            'url' => '/upload/offlinewriter/:attachment/:id/:style/:filename',
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

    public static $rules = [
        // create rules
    ];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
    // OfflineWriter

}

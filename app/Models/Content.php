<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Offlinewriter;
use App\Models\Topic;
use App\Models\Category;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Content extends Model implements StaplerableInterface {

    use EloquentTrait;

    use Sluggable;

    public $table = "contents";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'description',
		'quote',
		'body',
		'user_id',
		'offlinewriter_id',
		'offlinewriter_status',
		'category_id',
		'topic_id',
		'status',
    'foto',
    'slug'
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('foto', [
            'styles' => [
                'medium' => '540x360#',
                'small' => '270x180#',
                'thumb' => '135x90#' ],
            'url' => '/upload/content/:attachment/:id/:style/:filename',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offlinewriter()
    {
        return $this->belongsTo(Offlinewriter::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Content

}

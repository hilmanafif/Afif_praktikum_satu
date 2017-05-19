<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Company extends Model implements StaplerableInterface {

    use EloquentTrait;

    public $table = "companies";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
    'id',
		'name',
		'tax',
		'reg',
		'phone',
		'fax',
		'address1',
		'address2',
		'city',
		'province',
		'zip',
		'country',
		'logo',
		'timezone',
		'currency',
    'officer_position',
    'officer_name'
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('logo', [
            'styles' => [
                'medium' => '300x300#',
                'small' => '128x128#',
                'thumb' => '64x64#' ],
            'url' => '/upload/company/:attachment/:id/:style/:filename',
            'default_url' => '/img/missing.jpg'
        ]);

        parent::__construct($attributes);
    }

    public static $rules = [
        // create rules
    ];

    // Company

}

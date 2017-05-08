<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class UserMeta extends Model implements StaplerableInterface {
    use EloquentTrait;

    protected $table = 'user_meta';

    protected $fillable = [
        'user_id',
        'phone',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama_id',
        'alamat',
        'no_ktp',
        'img_ktp',
        'marketing',
        'terms_and_cond',
        'is_active',
        'activation_token',
        'avatar',
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('avatar', [
            'styles' => [
                'medium' => '300x300#',
                'small' => '128x128#',
                'thumb' => '64x64#',
            ],
            'url' => '/upload/user/:attachment/:id/:style/:filename',
            'default_url' => '/img/missing.jpg'
        ]);

        parent::__construct($attributes);
    }

    public function user()
    {
        return User::where('id', $this->user_id)->first();
    }

}

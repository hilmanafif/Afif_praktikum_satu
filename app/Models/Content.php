<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OfflineWriter;
use App\Models\Topic;

class Content extends Model
{
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
		'offline_writer_id',
		'offline_writer',
		'category_id',
		'topic_id',
		'status',

    ];

    public static $rules = [
        // create rules
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offlinewriter()
    {
        return $this->belongsTo(OfflineWriter::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    // Content

}

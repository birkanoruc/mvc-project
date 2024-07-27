<?php 

namespace Models;

use Core\Model;
use Models\User;

class UserMeta extends Model
{
    protected $table = 'user_metas';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
<?php 

namespace Models;

use Core\Model;
use Models\UserMeta;

class User extends Model
{
    protected $table = 'users';

    public function userMetas()
    {
        return $this->hasMany(UserMeta::class, 'user_id');
    }

}
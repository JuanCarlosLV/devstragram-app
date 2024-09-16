<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id'
    ];

    /* We relationed models. In this case we relationed the Post model with the User model. A post is relationed to an user. So the method we use for this is belongsTo() and we put the model of which the current model belongs to, in this case the User model. Because a posts belong just a single user not a lot of them.

    i.e user juan create 3 post, so the 3 post belong to juan no to another user like pepe.

    with select() method we can define wich fields we want to get from the user model

    */
    public function user(){
        return $this->belongsTo(User::class)->select([
            'name', 'username'
        ]);
    }

}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Blasts\BlastType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function avatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mp';
    }

    public function following()
    {
        return $this->belongsToMany(
            User::class, 'followers', 'user_id', 'following_id'
        );
    }

    public function followers()
    {
        return $this->belongsToMany(
            User::class, 'followers', 'following_id', 'user_id'
        );
    }

    public function blastsFromFollowing()
    {
        return $this->hasManyThrough(Blast::class, Follower::class, 'user_id', 'user_id', 'id', 'following_id');
    }

    //Trebuie sa verificam ca un utilizator sa poate da like o singura data unei postari
    public function hasLiked(Blast $blast){
        return $this->likes->contains('blast_id',$blast->id);
    }

    public function blasts()
    {
        return $this->hasMany(Blast::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    //Un user poate avea mai multe blasturi distribuite de tip REBLAST sau QUOTE(CITATE)
    public function reblasts()
    {
        return $this->hasMany(Blast::class)
            ->where('type',BlastType::REBLAST)
            ->orWhere('type',BlastType::CITAT);
    }
}

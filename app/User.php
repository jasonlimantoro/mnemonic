<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\FiltersSearch;

class User extends Authenticatable
{
    use Notifiable, FiltersSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
	];

	public function setNameAttribute($value)
	{
		$this->attributes['name'] = title_case($value);
	}
	public function setEmailAttribute($value)
	{
		$this->attributes['email'] = strtolower($value);
	}
	
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = bcrypt($value);
	}

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function role()
    {
		return $this->belongsTo(Role::class);
	}

	public function hasRole(string $role)
	{
		if($this->role()->whereName($role)->first()){
			return true;
		}
		return false;
	}

	public function assignRole(string $role)
	{
		return $this->role()
					->associate(Role::whereName($role)->firstOrFail())
					->save();
	}
}

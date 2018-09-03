<?php

namespace App\Models;

use App\Traits\FiltersResources;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property int|null $role_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Page[] $pages
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read \App\Models\Role|null $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 *
 */
class User extends Authenticatable
{
    use Notifiable, FiltersResources;

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
        return $this->belongsTo(Role::class)->withDefault([
            'name' => 'unassigned'
        ]);
    }

    public function hasRole(string $role)
    {
        if ($this->role()->whereName($role)->first()) {
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

    public function assignToDefault()
    {
        return $this->role()
                    ->dissociate()
                    ->save();
	}

	public function isAdmin()
	{
		return $this->role->name === 'admin';
	}

    public function isSuper()
    {
       return $this->role->name === 'superadmin';
	}

	public function permissions()
	{
		return $this->role->permissions();
	}

	public function getActions(string $permissionName)
	{
        $actions = [];
        $permission = $this->permissions()->whereName($permissionName);
        if ($permission->exists()) {
            $actions = $permission->first()->pivot->action;
        }
        return $actions;
	}
	
	public function permissibles(string $name)
	{
		$actions = $this->getActions($name);
		return static::isPermissable($actions);
	}

	public static function isPermissable(array $actions)
	{
		return array_keys($actions, true);
	}
}

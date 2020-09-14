<?php

namespace App\Models\Metrology;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function getRole()
    {
        return $this->roles()->first();
    }

    public function isAdministrator()
    {
        return $this->roles()->where('name', 'Admin')->exists();
    }

    public function isUser()
    {
        $user = $this->roles()->where('name', 'User')->exists();

        if ($user) return "User";
    }

    public function isDisabled()
    {
        $disabled = $this->roles()->where('name', 'Disabled')->exists();

        if ($disabled) return "Disabled";
    }

    public function isModerator()
    {
        $user = $this->roles()->where('name', 'Moderator')->exists();
        if ($user) return "Moderator";
    }

    public function podrazdelenies()
    {
        return $this->belongsToMany(Podrazdelenie::class, 'user_podrazdelenies', 'user_id', 'podrazdelenie_id');
    }

    public function getPodrazdeleniesNames()
    {
        if ($podrazdelenie = $this->podrazdelenies()->first()) {
            $podrazdelenies = $this->podrazdelenies->pluck('name')->toArray();
            $podrazdelenies_list = implode(", ", $podrazdelenies);

            return $podrazdelenies_list;
        }
        return 'Всі';
    }

    public function kabinets()
    {
        return $this->belongsToMany(Kabinet::class, 'user_kabinets', 'user_id', 'kabinet_id');
    }

    public function getKabinetsNames()
    {
        if ($kabinet = $this->kabinets()->first()) {
            $kabinets = $this->kabinets->pluck('name')->toArray();
            $kabinets_list = implode(", ", $kabinets);

            return $kabinets_list;
        }
        return 'Всі';
    }
}

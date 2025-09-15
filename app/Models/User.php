<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static find($id)
 */
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
        'imagen',
        'cv',
        'titulo_trabajo',
        'bio',
        'twitter',
        'facebook',
        'linkedin'
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
        'email_verified_at' => 'datetime',
    ];

    // Relaciones
    public function applications()
    {
        return $this->hasMany(\App\Models\Job\Application::class);
    }

    public function savedJobs()
    {
        return $this->hasMany(\App\Models\Job\JobSaved::class);
    }

    /**
     * Validate the password against the stored password without hashing.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(array $credentials)
    {
        return $this->password === $credentials['password'];
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
}

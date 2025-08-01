<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    const STATUS_PROCESSED = 'disetujui';
    const STATUS_APPROVED = 'disetujui';
    const STATUS_REJECTED = 'ditolak';
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'status',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

        public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
        public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    /**
     * Relasi ke notifikasi yang diterima user.
     */
    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class);
    }

    /**
     * Get unread notifications count.
     */
    public function getUnreadNotificationsCountAttribute()
    {
        return $this->notifikasi()->where('is_read', false)->count();
    }

    public function formulir()
    {
        return $this->hasMany(Formulir::class);
    }

}

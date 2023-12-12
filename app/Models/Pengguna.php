<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'idPengguna';
    protected $keyType = 'string';
    
    protected $fillable = [
        'idPengguna',
        'namaPengguna',
        'kelas',
        'nohp',
        'angkatan',
        'username',
        'password',
        'admin',
        'role'
    ];

    public function inventorys()
    {
        return $this->hasMany(Inventory::class, 'idPengguna', 'idPengguna');
    }

    public static function getAdmin()
    {
        return self::where('role', 'Admin')->value('namaPengguna');
    }

    public function getAuthIdentifierName()
    {
        return 'username';
    }
}

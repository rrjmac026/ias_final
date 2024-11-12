<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Yebor974\Filament\RenewPassword\Traits\RenewPassword;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt; // Add this

#[Observedby([UserObserver::class])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;
    use HasPanelShield;
    use RenewPassword;

    protected $fillable = [
        'name',
        'email',
        'password',
        'account_expires_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'account_expires_at' => 'datetime',
        ];
    }

    // Encrypt the 'name' attribute before saving it to the database
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Crypt::encryptString($value); // Encrypt the value before saving
    }

    // Decrypt the 'name' attribute when retrieving it
    public function getNameAttribute($value)
    {
        return Crypt::decryptString($value); // Decrypt the value when retrieving
    }

    public function canAccessFilament(): bool
    {
        return $this->hasRole('admin'); 
    }
}

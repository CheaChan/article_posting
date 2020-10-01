<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OauthClient extends Model
{
    protected $table = 'oauth_clients';
    protected $fillable = [
        'id', 
        'user_id',
        'name',
        'secret',
        'provider',
        'redirect',
        'expires_at',
        'personal_access_client',
        'password_client',
        'revoked',
    ];
}

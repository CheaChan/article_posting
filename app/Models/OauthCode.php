<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OauthCode extends Model
{
    protected $table = 'oauth_auth_codes';
    protected $fillable = [
        'id',
        'user_id',
        'client_id',
        'scopes',
        'revoked',
        'expires_at',
    ];
}

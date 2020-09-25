<?php

namespace App\Models;

use App\Servers\SSH;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ssh()
    {
        return new SSH(
            $this->ip,
            $this->port,
            $this->username,
            $this->password
        );
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = encrypt($password);
    }

    public function getPasswordAttribute($password)
    {
        return decrypt($password);
    }
}

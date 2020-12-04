<?php

namespace App\Models;

use Brackets\AdminAuth\Models\AdminUser as ModelsAdminUser;

class AdminUser extends ModelsAdminUser
{


    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}

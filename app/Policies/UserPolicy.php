<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $currentUser, User $user)
    {
        // 这里添加,当ID相等才可以编辑,当然,也可以给管理员白名单,授权策略要注册才有用,在app/Providers/AuthServiceProvider.php注册.
        return $currentUser->id === $user->id;
    }
}

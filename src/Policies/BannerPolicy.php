<?php

namespace Mpcs\Banner\Policies;

use App\Models\User;
use Mpcs\Banner\Models\Banner as Model;
use Illuminate\Auth\Access\HandlesAuthorization;
use Mpcs\Core\Facades\Core;

class BannerPolicy
{
    use HandlesAuthorization;

    /**
     * Policy 필터
     * @param  {object} $user user
     * @param  {string} $ability ability
     * @return {boolean} true(모든 권한 허용), false(모든 권한 허용안함), null(policy 권한 확인 진행)
     * @lastmodifiedDate 2020.02.13
     * @issue [[#redmine_issue_id]]
     */
    public function before($user, $ability)
    {
        if ($user->isAdministrator() || ($user->cans(['banner.manage']) === true)) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any temps.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        $isAllow = $user->cans(['banner.list']);
        return Core::responsePolicy($isAllow);
    }

    /**
     * Determine whether the user can view the temp.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Temp  $temp
     * @return mixed
     */
    public function view(User $user, Model $model)
    {
        $isAllow = $user->cans(['banner.view']);
        return Core::responsePolicy($isAllow);
    }

    /**
     * Determine whether the user can create temps.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $isAllow = $user->cans(['banner.create']);
        return Core::responsePolicy($isAllow);
    }

    /**
     * Determine whether the user can update the temp.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Temp  $temp
     * @return mixed
     */
    public function update(User $user, Model $model)
    {
        $isAllow = $user->cans(['banner.edit']);
        return Core::responsePolicy($isAllow);
    }

    /**
     * Determine whether the user can delete the temp.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Temp  $temp
     * @return mixed
     */
    public function delete(User $user, Model $model)
    {
        $isAllow = $user->cans(['banner.delete']);
        return Core::responsePolicy($isAllow);
    }

    /**
     * Determine whether the user can permanently delete the temp.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Temp  $temp
     * @return mixed
     */
    public function forceDelete(User $user, Model $model) {}
}

<?php
namespace App\Repositories;
use App\User as UserModel;

/**
 *
 */
class User
{
    protected $user;
    static protected $NB_USER_PAGINATE=10;

    function __construct(UserModel $user_model)
    {
        $this->user = $user_model;
    }

    public function lock($user_id)
    {
        $user = UserModel::find($user_id);
        $user->active = false;
        $user->tokens()->delete(); // rend invalide tous ces tokens
        $user->save();
        $user->refresh();
        return $user;
    }

    public function unlock($user_id)
    {
        $user = UserModel::find($user_id);
        $user->active = true;
        $user->save();
        $user->refresh();
        return $user;
    }

    public function getUsersByRole($role = CLIENT)
    {
        $users = UserModel::role($role)->paginate(self::$NB_USER_PAGINATE);
        foreach ($users as $key => $user) {
            $user->roleNames = $user->getRoleNames();
            $user->makeHidden("roles");
        }
        return $users;
    }

    public function revokeRoleForUser($user_id, $role = ASSISTANT)
    {
        $user = UserModel::find($user_id);
        $user->removeRole($role);
    }

    public function assignRoleForUser($user_id, $role = ASSISTANT)
    {
        $user = UserModel::find($user_id);
        $user->assignRole($role);
    }

    public function deleteUser($user_id)
    {
        $user = UserModel::find($user_id);
        try {
            $user->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }

    }

    public function updateUser($user_id, $data)
    {
        $update = UserModel::where("id", $user_id)
                    ->update($data);

        return $update;
    }

    public function createUser($data, $role = CLIENT)
    {
        $user =  UserModel::firstOrCreate($data);
        $user->assignRole($role);
        return $user;
    }

    public function is_unique_mail($email, $except = [])
    {
        $emails = UserModel::all()->pluck("email");
        foreach ($emails as $key => $value) {
            if(!in_array($value, $except)) {
                if($value == $email){
                    return false;
                }
            }
        }
        return true;
    }

    public function is_unique_phone($phone, $except = [])
    {
        $phones = UserModel::all()->pluck("phone");
        foreach ($phones as $key => $value) {
            if(!in_array($value, $except)) {
                if($value == $phone){
                    return false;
                }
            }
        }
        return true;
    }
}

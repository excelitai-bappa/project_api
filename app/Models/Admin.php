<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getpermissionGroups(){

        $permission_group = DB::table('permissions')
        ->select('group_name as name')
        ->groupBy('group_name')
        ->get();

        return $permission_group;
    }

    public static function getpermissionsByGroupName($group_name){

        $permission_group_by_id = DB::table('permissions')
        ->where('group_name',$group_name)
        ->get();

        return $permission_group_by_id;
    }

    public static function roleHasPermissions($role, $permissions){

        $hasPermission = true;

        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;

                return $hasPermission;
            }
        }

        return $hasPermission;
    }



}

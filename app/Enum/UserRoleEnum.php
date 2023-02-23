<?php
namespace App\Enum;

use Illuminate\Validation\Rules\Enum;

class UserRoleEnum extends Enum{

    const Admin = 'admin';
    const Manager = 'manager';
    const User = 'user';

    public static function getValues():Array
    {
        return  [
            self::Admin,
            self::User,
            self::Manager,
        ];
    }

    public function privileges():Array
    {
        return match($this->value){
            self::Admin => [
                'edit',
                'insert',
                'delete',
                'view',
            ],
            self::Manager => [
                'edit',
                'insert',
                'delete',
                'view',
            ],
            self::User => [
                'view'
            ]
        };
    }
}




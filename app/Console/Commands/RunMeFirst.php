<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RunMeFirst extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lllf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //You Need Spatie Package In order to this commands work

        //Create Permissions Of Parole
        $Show_Paroles = Permission::create(['name' => 'Show-Paroles', 'guard_name' => 'web']);
        $Show_Parole = Permission::create(['name' => 'Show-Parole', 'guard_name' => 'web']);
        $Add_Parole = Permission::create(['name' => 'Add-Parole', 'guard_name' => 'web']);
        $Update_Parole = Permission::create(['name' => 'Update-Parole', 'guard_name' => 'web']);
        $Delete_Parole = Permission::create(['name' => 'Delete-Parole', 'guard_name' => 'web']);

        //Create Permissions Of Role
        $Show_Roles = Permission::create(['name' => 'Show-Roles', 'guard_name' => 'web']);
        $Show_Role = Permission::create(['name' => 'Show-Role', 'guard_name' => 'web']);
        $Add_Role = Permission::create(['name' => 'Add-Role', 'guard_name' => 'web']);
        $Update_Role = Permission::create(['name' => 'Update-Role', 'guard_name' => 'web']);
        $Delete_Role = Permission::create(['name' => 'Delete-Role', 'guard_name' => 'web']);
        $ShowPermissionsOfaRole = Permission::create(['name' => 'ShowPermissionsOfaRole', 'guard_name' => 'web']);
        $ShowRolesOfaPermissions = Permission::create(['name' => 'ShowRolesOfaPermissions', 'guard_name' => 'web']);
        $assignPermissions = Permission::create(['name' => 'assignPermissions', 'guard_name' => 'web']);
        $assignRole = Permission::create(['name' => 'assignRole', 'guard_name' => 'web']);
        $RemovePermissions = Permission::create(['name' => 'RemovePermissions', 'guard_name' => 'web']);
        $RemoveRole = Permission::create(['name' => 'RemoveRole', 'guard_name' => 'web']);

        //Access To All
        $accessToAll = Permission::create(['name' => '*', 'guard_name' => 'web']);

        //Create Roles
        $Admin_Role = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        $Manager_Role = Role::create(['name' => 'Manager', 'guard_name' => 'web']);

        //Assign Permissions to roles
        $Admin_Role->givePermissionTo($accessToAll);
        $Manager_Role->givePermissionTo([$Show_Paroles, $Show_Parole, $Add_Parole, $Update_Parole, $Delete_Parole]);

        // Create Users
        $users = [
            ['name' => 'Admin', 'email' => 'Admin@gmail.com', 'password' => Hash::make('password')],
            ['name' => 'Manager', 'email' => 'Manager@gmail.com', 'password' => Hash::make('password')],
        ];

        for ($i = 0; $i < count($users); $i++) {
            User::create($users[$i]);
        }

        $Admin = User::where('name', 'Admin')->first();
        $Manager = User::where('name', 'Manager')->first();

        //Asign Role to Users
        $Admin->assignRole($Admin_Role);
        $Manager->assignRole($Manager_Role);

        //Return Mess
        $this->info('Done :D');
    }
}

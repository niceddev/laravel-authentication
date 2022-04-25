<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up()
    {
        User::updateOrCreate([
            'name'     => 'admin',
            'email'    => 'admin@admin',
            'password' => Hash::make('admin'),
            'is_admin' => 1
        ],[
            'name'     => 'admin',
            'email'    => 'admin@admin',
            'password' => Hash::make('admin'),
            'is_admin' => 1
        ]);
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::table('cities')
            ->insert([
                [
                    'name'     => 'Aqtobe',
                ],
                [
                    'name'     => 'Astana',
                ],
                [
                    'name'     => 'Almaty',
                ],
                [
                    'name'     => 'Karagandy',
                ],
                [
                    'name'     => 'Atyrau',
                ]
            ]);
    }
};

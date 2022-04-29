<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::table('products')
            ->insert([
                [
                    'name'     => 'Iphone 13',
                    'price'    => 100500,
                ],
                [
                    'name'     => 'Samsung S10',
                    'price'    => 90500,
                ],
                [
                    'name'     => 'OPPO',
                    'price'    => 80000,
                ],
                [
                    'name'     => 'Huawei',
                    'price'    => 40000,
                ],
                [
                    'name'     => 'Meizu',
                    'price'    => 35990,
                ]
            ]);
    }
};

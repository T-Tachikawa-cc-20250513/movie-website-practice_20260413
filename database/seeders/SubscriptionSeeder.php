<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('subscriptions')->insert([
            ['name' => 'Prime Video'],
            ['name' => 'U-Next'],
            ['name' => 'ディズニープラス'],
            ['name' => 'Netflix'],
            ['name' => 'FOD'],
            ['name' => 'DMM TV'],
            ['name' => 'Hulu'],
            ['name' => 'WOWOWオンデマンド'],
            ['name' => 'ABEMA'],
            ['name' => 'Lemino'],
            ['name' => 'TELASA'],
            ['name' => 'アニメタイム'],
            ['name' => 'TSUTAYA DISCAS'],
            ['name' => 'J:COM STREAM'],
        ]);
    }
}

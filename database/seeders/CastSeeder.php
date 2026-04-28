<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CastSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('casts')->insert([
            ['name' => 'キアヌ・リーブス'],
            ['name' => 'トム・クルーズ'],
            ['name' => 'レオナルド・ディカプリオ'],
            ['name' => 'ブラッド・ピット'],
            ['name' => 'ジョニー・デップ'],
            ['name' => 'ロバート・ダウニー・Jr.'],
            ['name' => 'クリス・ヘムズワース'],
            ['name' => 'スカーレット・ヨハンソン'],
            ['name' => 'ナタリー・ポートマン'],
            ['name' => 'アンジェリーナ・ジョリー'],
            ['name' => '山田孝之'],
            ['name' => '菅田将暉'],
            ['name' => '小栗旬'],
            ['name' => '長澤まさみ'],
            ['name' => '新垣結衣'],
        ]);
    }
}
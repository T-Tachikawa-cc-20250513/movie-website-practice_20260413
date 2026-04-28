<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            ['name' => 'アニメ'],
            ['name' => 'ドラマ'],
            ['name' => '恋愛'],
            ['name' => 'ホラー'],
            ['name' => 'アート・コンテンポラリー'],
            ['name' => '戦争'],
            ['name' => '音楽'],
            ['name' => 'ミュージカル'],
            ['name' => 'SF'],
            ['name' => '青春'],
            ['name' => 'コメディ'],
            ['name' => 'アクション'],
            ['name' => 'アドベンチャー・冒険'],
            ['name' => 'クライム'],
            ['name' => 'バイオレンス'],
            ['name' => 'ヤクザ・任侠'],
            ['name' => 'ギャング・マフィア'],
            ['name' => 'サスペンス'],
            ['name' => 'ミステリー'],
            ['name' => 'パニック'],
            ['name' => 'スリラー'],
            ['name' => 'ファミリー'],
            ['name' => 'ファンタジー'],
            ['name' => 'ドキュメンタリー'],
            ['name' => '歴史'],
            ['name' => '西部劇'],
            ['name' => '時代劇'],
            ['name' => '伝記'],
            ['name' => 'ショートフィルム・短編'],
            ['name' => 'オムニバス'],
        ]);
    }
}

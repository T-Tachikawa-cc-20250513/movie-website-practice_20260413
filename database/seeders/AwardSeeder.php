<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AwardSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('awards')->insert([
            ['name' => 'アカデミー賞'],
            ['name' => 'ゴールデングローブ賞'],
            ['name' => '日本アカデミー賞'],
            ['name' => '東京国際映画祭'],
            ['name' => 'カンヌ国際映画祭'],
            ['name' => 'ヴェネチア国際映画祭'],
            ['name' => 'ベルリン国際映画祭'],
            ['name' => 'トロント国際映画祭'],
            ['name' => 'サンダンス映画祭'],
            ['name' => 'ロサンゼルス映画批評家協会賞'],
            ['name' => '英国アカデミー賞'],
            ['name' => 'インディペンデント・スピリット賞'],
            ['name' => 'ニューヨーク映画批評家協会賞'],
            ['name' => '放送映画批評家協会賞'],
            ['name' => 'ブルーリボン賞'],
            ['name' => 'セザール賞'],
            ['name' => 'ナショナル・ボード・オブ・レビュー'],
            ['name' => 'Filmarks Awards'],
            ['name' => 'ゴールデンラズベリー賞'],
            ['name' => 'オースティン映画批評家協会賞'],
            ['name' => 'TAMA映画賞'],
            ['name' => 'アニー賞'],
            ['name' => 'モントリオール世界映画祭'],
            ['name' => 'ヨーロッパ映画賞'],
            ['name' => 'キネコ国際映画祭（キンダー・フィルム・フェスティバル）'],
            ['name' => 'ストックホルム国際映画祭'],
            ['name' => 'MTVムービー・アワード'],
            ['name' => 'カルロヴィ・ヴァリ国際映画祭'],
        ]);
    }
}

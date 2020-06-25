<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            'content' => '嫁',
            'code' => 'bride'
        ]);
        DB::table('attributes')->insert([
            'content' => '旦那',
            'code' => 'husband'
        ]);
        DB::table('attributes')->insert([
            'content' => '彼氏',
            'code' => 'boyfriend'
        ]);
        DB::table('attributes')->insert([
            'content' => '彼女',
            'code' => 'girlfriend'
        ]);
        DB::table('attributes')->insert([
            'content' => '父',
            'code' => 'father'
        ]);
        DB::table('attributes')->insert([
            'content' => '母',
            'code' => 'mother'
        ]);
        DB::table('attributes')->insert([
            'content' => '息子',
            'code' => 'son'
        ]);
        DB::table('attributes')->insert([
            'content' => '娘',
            'code' => 'daughter'
        ]);
        DB::table('attributes')->insert([
            'content' => '祖父',
            'code' => 'grandfather'
        ]);
        DB::table('attributes')->insert([
            'content' => '祖母',
            'code' => 'grandmother'
        ]);
        DB::table('attributes')->insert([
            'content' => '兄',
            'code' => 'brother'
        ]);
        DB::table('attributes')->insert([
            'content' => '姉',
            'code' => 'sister'
        ]);
        DB::table('attributes')->insert([
            'content' => '友人',
            'code' => 'friend'
        ]);
        DB::table('attributes')->insert([
            'content' => 'その他',
            'code' => 'other'
        ]);
    }
}

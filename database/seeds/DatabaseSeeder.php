<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 自分用のユーザーを作成
        factory(App\User::class)->create(
            ['name' => '自分', 'email' => 'aa@bb.net']
        );
        factory(App\Admin::class)->create(
            ['username' => 'taro', 'password' => bcrypt('jiro')]
        );

        // ほかのユーザーを作成
        factory(App\User::class, 9)->create();
    }
}

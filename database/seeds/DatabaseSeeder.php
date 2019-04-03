<?php

use App\Article;
use App\Todo;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        factory(Todo::class, 20)->create();
        factory(Article::class, 20)->create();
        factory(User::class, 1)->create();
        
    }
}

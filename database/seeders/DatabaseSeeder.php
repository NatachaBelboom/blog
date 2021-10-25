<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
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


        $natacha = User::create([
           'name'=>'Natacha Belboom',
           'email'=>'natacha.belboom@hotmail.com',
           'password'=>'Natacha',
           'username'=>'natacha-belboom',
        ]);

        $laura = User::create([
            'name'=>'Laura Belboom',
            'email'=>'laura.belboom@hotmail.com',
            'password'=>'Laura',
            'username'=>'laura-belboom',

        ]);


        $family = Category::create([
            'name'=>'Family',
            'slug'=>'family',
        ]);
        $work = Category::create([
            'name'=>'Work',
            'slug'=>'work',
        ]);
        $hobby = Category::create([
            'name'=>'Hobby',
            'slug'=>'hobby',
        ]);

        Post::factory(100)->create();

        Comment::factory(400)->create();


        /* Post::create([
             'title' => 'mon premier post',
             'body' => 'un super post pour ma soeur',
             'published_at' => now()->subDays(2),
             'slug' => 'post1',
             'excerpt' => '-',
             'category_id'=> $family->id,
             'user_id'=> $natacha->id,
         ]);
         Post::create([
             'title' => 'mon deuxième post',
             'body' => 'un super post pour mon frere',
             'published_at' => now()->subDays(30),
             'slug' => 'post2',
             'excerpt' => '--',
             'category_id'=> $family->id,
             'user_id'=> $natacha->id,

         ]);
         Post::create([
             'title' => 'mon troisième post',
             'body' => 'un super post sur laravel',
             'published_at' => now()->subDays(10),
             'slug' => 'post3',
             'excerpt' => '---',
             'category_id'=> $work->id,
             'user_id'=> $laura->id,

         ]);
         Post::create([
             'title' => 'mon quatrième post',
             'body' => 'un super post sur VueJS',
             'published_at' => now()->subDays(12),
             'slug' => 'post4',
             'excerpt' => '----',
             'category_id'=> $work->id,
             'user_id'=> $laura->id,

         ]);*/

    }
}

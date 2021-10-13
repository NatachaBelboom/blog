<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random = rand(0,100);
        if ($random<2){
            return [
                'user_id'=> User::factory()->create(),
                'category_id' => Category::factory()->create(),
                'title' => $this->faker->sentence(),
                'slug' => $this->faker->slug(),
                'excerpt' => $this->faker->sentence(),
                'body' => $this->faker->paragraph(),
                'published_at' =>now(),
            ];
        }else{
            return [
                'user_id'=>  User::all()->shuffle()->first(),
                'category_id' => Category::all()->shuffle()->first(),
                'title' => $title = $this->faker->sentence(),
                'slug' => Str::slug($title),
                'excerpt' => '<p>' . implode('</p><p>' , $this->faker->paragraphs(2)) . '</p>',
                'body' => '<p>' . implode('</p><p>' , $this->faker->paragraphs(7)) . '</p>',
                'published_at' =>now(),

            ];
        }

        /*
         * $r = random int(0,100);
         *
         * $user = $r === 100 ?
         *  USer::factory() :
         * ($r >= 88 ?
         *  User::firstWhere('email', 'natacha.belboom@hotmail.com);
         *  User::firstWhere('email', 'laura.belboom@hotmail.com);
         * );
         *
         * $r = random int(0,100);
         * $availableCategories = Category::where('slug', 'family')
         *  ->orWhere('slug', 'work')
         * ->orWhere('slug', 'hobby')
         * ->get();
         * $category = $r === 100 ?
         *  Category::factory() :
         * $availableCategories[random int(0,2)];
         */
    }
}

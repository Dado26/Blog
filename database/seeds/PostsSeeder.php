<?php

use Illuminate\Database\Seeder;
use App\Models\posts;
use App\Models\Category;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fejker = Faker\Factory::create();
        $fejker->addProvider(new Faker\Provider\Lorem($fejker));
        
        $max_categories = Category::all()->count();
        
        
        
        
        for($i=0; $i < 50; $i++) {
            
        $title = $fejker->catchPhrase();
        $content = $fejker->sentences(80, true);
        
            Posts::create([
                'user_id'=> 1,
                'category_id'=> rand(1, $max_categories), 
                'slug'=>str_slug($title),
                'title'=> $title,
                'content'=> $content,
                'image'=> null,
                'published_from'=> null,
                'created_at'=> $fejker->dateTimeBetween('-1 years', 'now'),
            ]);
        }
    }
}

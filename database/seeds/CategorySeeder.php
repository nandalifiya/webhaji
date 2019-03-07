<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category1 = factory(App\Category::class)->create([
          'name' => 'blog'
        ]);
        $category2 = factory(App\Category::class)->create([
          'name' => 'recommend  '
        ]);
        $category3 = factory(App\Category::class)->create([
          'name' => 'umroh'
        ]);
        $category4 = factory(App\Category::class)->create([
          'name' => 'haji'
        ]);
    }
}

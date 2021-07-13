<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $data = new Category();
        $data->name = 'category1';
        $data->save();
        $data = new Category();
        $data->name = 'category2';
        $data->save();
        $data = new Category();
        $data->name = 'category3';
        $data->save();
        $data = new Category();
        $data->name = 'category1.1';
        $data->parent_id = 1;
        $data->save();
        $data = new Category();
        $data->name = 'category1.2';
        $data->parent_id = 1;
        $data->save();
        $data = new Category();
        $data->name = 'category1.3';
        $data->parent_id = 1;
        $data->save();
        $data = new Category();
        $data->name = 'category1.1.1';
        $data->parent_id = 4;
        $data->save();
        $data = new Category();
        $data->name = 'category2.1';
        $data->parent_id = 2;
        $data->save();
        $data = new Category();
        $data->name = 'category3.1';
        $data->parent_id = 3;
        $data->save();
    }
}

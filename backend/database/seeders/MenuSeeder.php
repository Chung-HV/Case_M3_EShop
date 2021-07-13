<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;


class MenuSeeder extends Seeder
{
    private $Menu;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Menu();
        $data->name = 'Menu1';
        $data->save();
        $data = new Menu();
        $data->name = 'Menu2';
        $data->save();
        $data = new Menu();
        $data->name = 'Menu3';
        $data->save();
        $data = new Menu();
        $data->name = 'Menu 1.1';
        $data->parent_id = 1;
        $data->save();
        $data = new Menu();
        $data->name = 'Menu 1.2';
        $data->parent_id = 1;
        $data->save();
        $data = new Menu();
        $data->name = 'Menu 1.3';
        $data->parent_id = 1;
        $data->save();
        $data = new Menu();
        $data->name = 'Menu 1.1.1';
        $data->parent_id = 1;
        $data->save();
        $data = new Menu();
        $data->name = 'Menu2.1';
        $data->parent_id = 2;
        $data->save();
        $data = new Menu();
        $data->name = 'Menu3.1';
        $data->parent_id = 2;
        $data->save();
    }
}

<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('categories')->insert([
            
            [
                'name' => 'Food',
                'slug' => 'food',
                'parent_id' => 0,
                'image' => '',
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Drinks',
                'slug' => 'drinks',
                'parent_id' => 0,
                'image' => '',
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Restraunts',
                'slug' => 'restraunts',
                'parent_id' => 0,
                'image' => '',
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            ]);
        }
    }

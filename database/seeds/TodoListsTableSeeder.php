<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_lists')->truncate();

        $todoLists = [];
        for ($i=0; $i < 10; $i++){
            $todoLists[] = [
                'title' => "Todo list {$i}",
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero rem alias asperiores! Obcaecati ad quae, labore quo delectus voluptatum, eaque dolore ab, quibusdam pariatur accusantium deserunt quasi laboriosam? Laboriosam, quasi.',
                'user_id' => rand(1,2)
            ];
        }

        DB::table('todo_lists')->insert($todoLists);
    }
}

<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Task::class, 100)->create()->each(function($task) {
			$task->save(factory(App\Task::class)->make());
		});
    }
}

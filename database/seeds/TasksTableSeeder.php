<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder {

    public function run() {
        // Wipe the table clean before populating
        DB::table('tasks')->delete();

        $tasks = array(
            ['id' => 1, 'user_id' => 1, 'name' => 'Task 1', 'slug' => 'task-1', 'description' => 'Description of the first task', 'status' => 'completed', 'created_at' => new DateTime('2016-01-01'), 'updated_at' => new DateTime],
            ['id' => 2, 'user_id' => 1, 'name' => 'Task 2', 'slug' => 'task-2', 'description' => 'Description of the second task', 'status' => 'inprogress', 'created_at' => new DateTime('2016-01-01'), 'updated_at' => new DateTime],
            ['id' => 3, 'user_id' => 2, 'name' => 'Task 3', 'slug' => 'task-3', 'description' => 'Description of the third task','status' => 'new', 'created_at' => new DateTime('2016-02-01'), 'updated_at' => new DateTime],
            ['id' => 4, 'user_id' => 1, 'name' => 'Task 4', 'slug' => 'task-4', 'description' => 'Description of the fourth task', 'status' => 'completed', 'created_at' => new DateTime('2016-03-01'), 'updated_at' => new DateTime],
            ['id' => 5, 'user_id' => 1, 'name' => 'Task 5', 'slug' => 'task-5', 'description' => 'Description of the fifth task', 'status' => 'inprogress', 'created_at' => new DateTime('2016-03-01'), 'updated_at' => new DateTime],
            ['id' => 6, 'user_id' => 2, 'name' => 'Task 6', 'slug' => 'task-6', 'description' => 'Description of the task','status' => 'new', 'created_at' => new DateTime('2016-03-01'), 'updated_at' => new DateTime],
            ['id' => 7, 'user_id' => 1, 'name' => 'Task 7', 'slug' => 'task-7', 'description' => 'Description of the task', 'status' => 'completed', 'created_at' => new DateTime('2016-04-01'), 'updated_at' => new DateTime],
            ['id' => 8, 'user_id' => 1, 'name' => 'Task 8', 'slug' => 'task-8', 'description' => 'Description of the task', 'status' => 'inprogress', 'created_at' => new DateTime('2016-05-01'), 'updated_at' => new DateTime],
            ['id' => 9, 'user_id' => 2, 'name' => 'Task 9', 'slug' => 'task-9', 'description' => 'Description of the task','status' => 'new', 'created_at' => new DateTime('2016-05-01'), 'updated_at' => new DateTime],
            ['id' => 10, 'user_id' => 1, 'name' => 'Task 10', 'slug' => 'task-10', 'description' => 'Description of the task', 'status' => 'completed', 'created_at' => new DateTime('2016-06-01'), 'updated_at' => new DateTime],
            ['id' => 11, 'user_id' => 1, 'name' => 'Task 11', 'slug' => 'task-11', 'description' => 'Description of the task', 'status' => 'completed', 'created_at' => new DateTime('2016-06-01'), 'updated_at' => new DateTime],
            ['id' => 12, 'user_id' => 1, 'name' => 'Task 12', 'slug' => 'task-12', 'description' => 'Description of the task', 'status' => 'inprogress', 'created_at' => new DateTime('2016-06-01'), 'updated_at' => new DateTime],
            ['id' => 13, 'user_id' => 2, 'name' => 'Task 13', 'slug' => 'task-13', 'description' => 'Description of the task','status' => 'new', 'created_at' => new DateTime('2016-06-01'), 'updated_at' => new DateTime],
            ['id' => 14, 'user_id' => 1, 'name' => 'Task 14', 'slug' => 'task-14', 'description' => 'Description of the task', 'status' => 'inprogress', 'created_at' => new DateTime('2016-08-01'), 'updated_at' => new DateTime],
            ['id' => 15, 'user_id' => 2, 'name' => 'Task 15', 'slug' => 'task-15', 'description' => 'Description of the task','status' => 'new', 'created_at' => new DateTime('2016-09-01'), 'updated_at' => new DateTime],
            ['id' => 16, 'user_id' => 1, 'name' => 'Task 16', 'slug' => 'task-16', 'description' => 'Description of the task', 'status' => 'completed', 'created_at' => new DateTime('2016-09-01'), 'updated_at' => new DateTime],
            ['id' => 17, 'user_id' => 1, 'name' => 'Task 17', 'slug' => 'task-17', 'description' => 'Description of the task', 'status' => 'inprogress', 'created_at' => new DateTime('2016-11-01'), 'updated_at' => new DateTime],
            ['id' => 18, 'user_id' => 2, 'name' => 'Task 18', 'slug' => 'task-18', 'description' => 'Description of the task','status' => 'new', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        DB::table('tasks')->insert($tasks);
    }

}

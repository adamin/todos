<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder {

    public function run() {
        // Wipe the table clean before populating
        DB::table('notes')->delete();

        $notes = array(
            ['id' => 1, 'task_id' => 1, 'user_id' => 1, 'slug' => 'note-1', 'title' => 'Note 1', 'content' => 'De', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'task_id' => 1, 'user_id' => 2, 'slug' => 'note-2', 'title' => 'Note 2', 'content' => 'Depends', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'task_id' => 2, 'user_id' => 2, 'slug' => 'note-3', 'title' => 'Note 3', 'content' => 'Depends on the first task', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        DB::table('notes')->insert($notes);
    }

}

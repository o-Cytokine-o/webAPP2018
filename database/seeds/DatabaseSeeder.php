<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::insert("insert into tasks (task_name,price,date,url,meritto,demeritto)
        values ('rrrr','1234','2018/05/21','url','meritto','demeritto')");


    }
}

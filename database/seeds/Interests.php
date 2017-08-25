<?php

use Illuminate\Database\Seeder;

class Interests extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('interests')->insert([
            'fileid' => 1,
            'userid' => 1,
            'interest' => 'Tech',
            
        ]);
    }
}

<?php

class UsersTableSeeder extends Seeder 
{
    public function run()
    {
        DB::table('users')->delete();

        $data = array(
            //  id, username, password
            array(1, 'foo', 'test'),
        );

        $items = array();
        foreach($data as $item) {
            $items[] = array(
                'id'         => $item[0],
                'username'   => $item[1],
                'password'   => Hash::make($item[2]),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            );
        }

        DB::table('users')->insert($items);
    }
}

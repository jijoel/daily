<?php


class Day007_TodosTableSeeder extends Seeder 
{
    public function run()
    {
        DB::table('day007_todos')->delete();

        $data = array(
            //  id, text
            array(1, 'Test Todo'),
            array(2, 'Another'),
            array(3, 'And One More'),
        );

        $items = array();
        foreach($data as $item) {
            $items[] = array(
                'id'         => $item[0],
                'item'       => $item[1],
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            );
        }

        DB::table('day007_todos')->insert($items);
    }
}

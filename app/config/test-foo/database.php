<?php

return array( 
    'default' => 'codeception',
    'connections' => array(
        'codeception' => array(
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ),
    )
);

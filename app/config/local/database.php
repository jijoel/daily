<?php

return array(

    'connections' => array(

        'codeception' => array(
            'driver'   => 'sqlite',
            'database' => app_path().'/tests/codeception/_data/db.sqlite',
            'prefix'   => '',
        ),
        
    ),

);


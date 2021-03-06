<?php

return [
    'model' => [
        'activity_log' => [
            'log_name' => 'ModelEvent',
        ],
    ],
    'date_format' => [
        'created_at' => [
            'formatOne' => 'jS M Y h:i:s A',
        ],
        'updated_at' => [
            'formatOne' => 'jS M Y h:i:s A',
        ],
    ],
    'date_diff_for_humans_format' => [
        'created_at' => [
            'formatOne' => ['parts' => 3, 'join' => false, 'short' => true],
        ],
        'updated_at' => [
            'formatOne' => ['parts' => 3, 'join' => false, 'short' => true],
        ],
    ],

    'adminpanel' => [
        'tables' => [
            'per_page_select_options' => [
                15, 30, 50,
            ],
        ],
    ],
];

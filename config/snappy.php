<?php

// set config sesuaikan dengan environment
// https://github.com/barryvdh/laravel-snappy

return array(


    'pdf' => array(
        'enabled' => true,
        //'binary'  => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"',
        // Ubuntu Linux / Docker
        'binary' => '/usr/local/bin/wkhtmltopdf.sh',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltoimage',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);

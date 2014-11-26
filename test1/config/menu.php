<?php


Config::Set('menu.data.test1', array(
    'init'        => array(
        'fill' => array(
            'random_topic' => array('limit' => 5),
            'user_topic'   => array('limit' => 5),
            'list'         => array('*'),
        ),
        'cache' => 'p1h',
    ),
    'description' => '{{plugin.test1.description}}',
    'list'        => array(
        'index'       => array(
            'text'        => '{{plugin.test1.title_item_1}}',
            'link'        => 'http://altocms.ru',
            'description' => '{{plugin.test1.description_item_1}}',
            'active'      => FALSE,
        ),
        'test_1_hook' => '',
    )
));
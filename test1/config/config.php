<?php

Config::Set('module.menu.admin', array_merge(
    Config::Get('module.menu.admin'),
    array('test1')
));
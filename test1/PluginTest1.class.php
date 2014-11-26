<?php
/** Запрещаем напрямую через браузер обращение к этому файлу.  */
if (!class_exists('Plugin')) {
    die('Hacking attempt!');
}


class PluginTest1 extends Plugin {

    protected $aInherits = array(
        'module' => array(
            'ModuleMenu',
        )
    );

}

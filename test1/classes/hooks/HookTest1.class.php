<?php

class PluginTest1_HookTest1 extends Hook {

    /**
     * Регистрация хуков
     */
    public function RegisterHook() {
        $this->AddHook('template_test_1_hook', 'TemplateHook');
    }

    public function TemplateHook() {

        return "<li>Строчка добавлена хуком</li>";

    }

}

<?php

class PluginTest1_ModuleMenu extends PluginTest1_Inherit_ModuleMenu {
    /**
     * Маппер модуля
     * @var PluginTest1_ModuleMenu_MapperMenuTest1
     */
    protected $oTest1Mapper;

    /**
     * Инициализация модуля
     */
    public function Init() {

        parent::Init();

        // Получение мапперов
        $this->oTest1Mapper = Engine::GetMapper('PluginTest1_ModuleMenu', 'MenuTest1');

    }

    /**
     * Обработчик формирования меню в режиме random_topic
     *
     * @param string[] $aConfig Параметры меню
     * @param array $aMenu Само меню
     * @return array
     */
    public function ProcessRandomTopicMode($aConfig, $aMenu) {

        $aItems = array();

        /** @var ModuleTopic_EntityTopic[] $aTopic */
        $aTopic = $this->Topic_GetTopicsAdditionalData(
            $this->oTest1Mapper->GetRandomTopicId($aConfig['limit'],
                E::IsUser() ? E::UserId() : FALSE)
        );

        foreach ($aTopic as $oTopic) {
            $sItemId = F::RandomStr(5);
            $aItems[$sItemId] = $this->CreateMenuItem($sItemId, array(
                'text' => $oTopic->getTitle(),
                'link' => $oTopic->getUrl(),
            ));
        }

        return $aItems;

    }

    /**
     * Обработчик формирования меню в режиме user_topic
     *
     * @param string[] $aConfig Параметры меню
     * @param array $aMenu Само меню
     * @return array
     */
    public function ProcessUserTopicMode($aConfig, $aMenu) {

        if (!E::IsUser()) {
            return array();
        }

        $aItems = array();

        /** @var ModuleTopic_EntityTopic[] $aTopic */
        $aTopic = $this->Topic_GetTopicsAdditionalData($this->oTest1Mapper->GetUserTopicId($aConfig['limit'], E::UserId()));

        foreach ($aTopic as $oTopic) {
            $sItemId = F::RandomStr(5);
            $aItems[$sItemId] = $this->CreateMenuItem($sItemId, array(
                'text' => $oTopic->getTitle(),
                'link' => $oTopic->getUrl(),
            ));
        }

        return $aItems;

    }

}
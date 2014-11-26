<?php

class PluginTest1_ModuleMenu_MapperMenuTest1 extends Mapper {

    public function GetRandomTopicId($iLimit, $iAuthorId = FALSE) {

        return $this->oDb->selectCol(
            "SELECT topic_id FROM ?_topic WHERE 1=1 {AND user_id <> ?d} ORDER BY RAND() LIMIT 0, ?d",
            $iAuthorId ? $iAuthorId : DBSIMPLE_SKIP,
            $iLimit
        );


    }

    public function GetUserTopicId($iLimit, $iAuthorId) {

        return $this->oDb->selectCol(
            "SELECT topic_id FROM ?_topic WHERE user_id = ?d ORDER BY topic_id DESC LIMIT 0, ?d",
            $iAuthorId,
            $iLimit
        );

    }

}
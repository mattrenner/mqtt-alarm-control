<?php

namespace AlarmControl\Messages\Panel;

use AlarmControl\Messages\MessageInterface;

class TamperRestore implements MessageInterface {

    public static function getDescription()
    {
        return 'Tamper alarm restore at panel';
    }

    public static function getMessagePattern()
    {
        return '/TR/';
    }

    public static function getInternalDefinition()
    {
        return 'tamper_restore';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/panel';
    }
}
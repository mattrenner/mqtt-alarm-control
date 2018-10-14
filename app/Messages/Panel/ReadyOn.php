<?php

namespace AlarmControl\Messages\Panel;

use AlarmControl\Messages\MessageInterface;

class ReadyOn implements MessageInterface {

    public static function getDescription()
    {
        return 'Panel Ready (zones sealed)';
    }

    public static function getMessagePattern()
    {
        return '/RO/';
    }

    public static function getInternalDefinition()
    {
        return 'ready';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/panel';
    }
}
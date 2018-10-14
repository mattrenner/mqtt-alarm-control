<?php

namespace AlarmControl\Messages\Panel;

use AlarmControl\Messages\MessageInterface;

class NotReady implements MessageInterface {

    public static function getDescription()
    {
        return 'Panel Not Ready (zones unsealed)';
    }

    public static function getMessagePattern()
    {
        return '/NR/';
    }

    public static function getInternalDefinition()
    {
        return 'not_ready';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/panel';
    }
}
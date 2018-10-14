<?php

namespace AlarmControl\Messages\Panel;

use AlarmControl\Messages\MessageInterface;

class BatteryRestore implements MessageInterface
{

    public static function getDescription()
    {
        return 'Mains restore to panel';
    }

    public static function getMessagePattern()
    {
        return '/MR/';
    }

    public static function getInternalDefinition()
    {
        return 'mains_restore';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/panel';
    }
}
<?php

namespace AlarmControl\Messages\Panel;

use AlarmControl\Messages\MessageInterface;

class BatteryFail implements MessageInterface {

    public static function getDescription()
    {
        return 'Battery failure at panel';
    }

    public static function getMessagePattern()
    {
        return '/BF/';
    }

    public static function getInternalDefinition()
    {
        return 'battery_fail';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/panel';
    }
}
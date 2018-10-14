<?php

namespace AlarmControl\Messages\Zone;

use AlarmControl\Messages\MessageInterface;

class BatteryOk implements MessageInterface {

    public static function getDescription()
    {
        return 'Battery OK at Zone';
    }

    public static function getMessagePattern()
    {
        return '/ZBR(<identifier>[0-9]{1})/';
    }

    public static function getInternalDefinition()
    {
        return 'battery_ok';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/zone/%s';
    }
}
<?php

namespace AlarmControl\Messages\Zone;

use AlarmControl\Messages\MessageInterface;

class BatteryLow implements MessageInterface {

    public static function getDescription()
    {
        return 'Battery low at Zone';
    }

    public static function getMessagePattern()
    {
        return '/ZBL(<identifier>[0-9]{1})/';
    }

    public static function getInternalDefinition()
    {
        return 'battery_low';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/zone/%s';
    }
}
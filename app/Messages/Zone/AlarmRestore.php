<?php

namespace AlarmControl\Messages\Zone;

use AlarmControl\Messages\MessageInterface;

class AlarmRestore implements MessageInterface {

    public static function getDescription()
    {
        return 'Alarm Restored at Zone';
    }

    public static function getMessagePattern()
    {
        return '/ZR(<identifier>[0-9]{1})/';
    }

    public static function getInternalDefinition()
    {
        return 'alarm_restore';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/zone/%s';
    }
}
<?php

namespace AlarmControl\Messages\Zone;

use AlarmControl\Messages\MessageInterface;

class Alarm implements MessageInterface {

    public static function getDescription()
    {
        return 'Alarm at Zone';
    }

    public static function getMessagePattern()
    {
        return '/ZA(<identifier>[0-9]{1})/';
    }

    public static function getInternalDefinition()
    {
        return 'alarm';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/zone/%s';
    }
}
<?php

namespace AlarmControl\Messages\Zone;

use AlarmControl\Messages\MessageInterface;

class Bypass implements MessageInterface {

    public static function getDescription()
    {
        return 'Zone Bypassed';
    }

    public static function getMessagePattern()
    {
        return '/ZBY(<identifier>[0-9]{1})/';
    }

    public static function getInternalDefinition()
    {
        return 'bypass';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/zone/%s';
    }
}
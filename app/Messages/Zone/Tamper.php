<?php

namespace AlarmControl\Messages\Zone;

use AlarmControl\Messages\MessageInterface;

class Tamper implements MessageInterface {

    public static function getDescription()
    {
        return 'Zone Tamper';
    }

    public static function getMessagePattern()
    {
        return '/ZT(<identifier>[0-9]{1})/';
    }

    public static function getInternalDefinition()
    {
        return 'tamper';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/zone/%s';
    }
}
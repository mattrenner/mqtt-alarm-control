<?php

namespace AlarmControl\Messages\Zone;

use AlarmControl\Messages\MessageInterface;

class Closed implements MessageInterface {

    public static function getDescription()
    {
        return 'Zone Closed (motion detected)';
    }

    public static function getMessagePattern()
    {
        return '/ZC(?<identifier>[0-9]{1})/';
    }

    public static function getInternalDefinition()
    {
        return 'closed';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/zone/%s';
    }
}
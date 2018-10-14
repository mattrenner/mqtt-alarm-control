<?php

namespace AlarmControl\Messages\Zone;

use AlarmControl\Messages\MessageInterface;

class Open implements MessageInterface {

    public static function getDescription()
    {
        return 'Zone Open (sealed)';
    }

    public static function getMessagePattern()
    {
        return '/ZO(?<identifier>[0-9]{1})/';
    }

    public static function getInternalDefinition()
    {
        return 'open';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/zone/%s';
    }
}
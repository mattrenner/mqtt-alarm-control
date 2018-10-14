<?php

namespace AlarmControl\Messages\Zone;

use AlarmControl\Messages\MessageInterface;

class BypassRestore implements MessageInterface {

    public static function getDescription()
    {
        return 'Zone Bypass Restore';
    }

    public static function getMessagePattern()
    {
        return '/ZBYR(<identifier>[0-9]{1})/';
    }

    public static function getInternalDefinition()
    {
        return 'bypass_restore';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/zone/%s';
    }
}
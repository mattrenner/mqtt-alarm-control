<?php

namespace AlarmControl\Messages\Area;

use AlarmControl\Messages\MessageInterface;

class ExitDelay implements MessageInterface {

    public static function getDescription()
    {
        return 'Area Exit Delay';
    }

    public static function getMessagePattern()
    {
        return '/EA(?<identifier>[0-9]{1})/';
    }

    public static function getInternalDefinition()
    {
        return 'exit_delay';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/area/%s';
    }
}
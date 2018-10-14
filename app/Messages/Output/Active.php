<?php

namespace AlarmControl\Messages\Output;

use AlarmControl\Messages\MessageInterface;

class Active implements MessageInterface {

    public static function getDescription()
    {
        return 'Output activated';
    }

    public static function getMessagePattern()
    {
        return '/OO(?<identifier>[0-9]{1,2})/';
    }

    public static function getInternalDefinition()
    {
        return 'active';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/output/%s';
    }
}
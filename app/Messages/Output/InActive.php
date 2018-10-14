<?php

namespace AlarmControl\Messages\Output;

use AlarmControl\Messages\MessageInterface;

class InActive implements MessageInterface {

    public static function getDescription()
    {
        return 'Output not active';
    }

    public static function getMessagePattern()
    {
        return '/OR(?<identifier>[0-9]{1,2})/';
    }

    public static function getInternalDefinition()
    {
        return 'in_active';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/output/%s';
    }
}
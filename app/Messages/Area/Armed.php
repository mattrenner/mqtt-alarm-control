<?php

namespace AlarmControl\Messages\Area;

use AlarmControl\Messages\MessageInterface;

class Armed implements MessageInterface {

    public static function getDescription()
    {
        return 'Area Armed';
    }

    public static function getMessagePattern()
    {
        return '/A(?<identifier>[0-9]{1})/';
    }

    public static function getInternalDefinition()
    {
        return 'armed';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/area/%s';
    }
}
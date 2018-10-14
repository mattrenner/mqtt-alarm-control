<?php

namespace AlarmControl\Messages\Panel;

use AlarmControl\Messages\MessageInterface;

class MainsFail implements MessageInterface {

    public static function getDescription()
    {
        return 'Mains power failure on panel';
    }

    public static function getMessagePattern()
    {
        return '/MF/';
    }

    public static function getInternalDefinition()
    {
        return 'mains_fail';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/panel';
    }
}
<?php

namespace AlarmControl\Messages\Panel;

use AlarmControl\Messages\MessageInterface;

class Tamper implements MessageInterface {

    public static function getDescription()
    {
        return 'Tamper alarm at panel';
    }

    public static function getMessagePattern()
    {
        return '/TA/';
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
        return 'alarm/panel';
    }
}
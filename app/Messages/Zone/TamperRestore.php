<?php

namespace AlarmControl\Messages\Zone;

use AlarmControl\Messages\MessageInterface;

class TamperRestore implements MessageInterface {

    public static function getDescription()
    {
        return 'Zone Tamper';
    }

    public static function getMessagePattern()
    {
        return '/ZTR(<identifier>[0-9]{1})/';
    }

    public static function getInternalDefinition()
    {
        return 'tamper_restore';
    }

    /**
     * @return string
     */
    public static function getInternalPath()
    {
        return 'alarm/zone/%s';
    }
}
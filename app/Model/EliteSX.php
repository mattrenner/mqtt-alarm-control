<?php

namespace AlarmControl\Model;

use AlarmControl\Messages;
use AlarmControl\Commands;

class EliteSX implements ModelInterface {

    public function getModelName()
    {
        return 'Elite SX';
    }

    public function getExpectedEstablishedMessage()
    {
        return 'Welcome';
    }


    public function getStatusCommand()
    {
        return 'STATUS';
    }

    public function getKeepAliveTimeout()
    {
        return 20;
    }

    public function getSupportedMessages()
    {
        return [
            Messages\Panel\BatteryRestore::class,
            Messages\Panel\BatteryFail::class,
            Messages\Panel\MainsFail::class,
            Messages\Panel\MainsRestore::class,
            Messages\Panel\Tamper::class,
            Messages\Panel\TamperRestore::class,
            Messages\Panel\ReadyOn::class,
            Messages\Panel\NotReady::class,

            Messages\Area\Armed::class,
            Messages\Area\Disarmed::class,
            Messages\Area\ExitDelay::class,

            Messages\Zone\Alarm::class,
            Messages\Zone\AlarmRestore::class,
            Messages\Zone\BatteryLow::class,
            Messages\Zone\BatteryOk::class,
            Messages\Zone\Bypass::class,
            Messages\Zone\BypassRestore::class,
            Messages\Zone\Open::class,
            Messages\Zone\Closed::class,
            Messages\Zone\Tamper::class,
            Messages\Zone\TamperRestore::class,

            Messages\Output\Active::class,
            Messages\Output\InActive::class
        ];
    }

    public function getSupportedCommands()
    {
        return [
            Commands\Zone\Bypass::class,
            Commands\Zone\Unbypass::class,

            Commands\Area\Arm::class,
            Commands\Area\Disarm::class,

            Commands\Panel\Mem::class
        ];
    }

    public function getIgnoreMessages()
    {
        return ['OK Status'];
    }

}
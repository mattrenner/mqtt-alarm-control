<?php

namespace AlarmControl\Traits;

use AlarmControl\Commands\CommandInterface;
use AlarmControl\Alarm;
use AlarmControl\Exception\CommandException;

trait HasCommandsTrait {

    /** @var CommandInterface[] */
    protected $commands = [];

    /**
     * @param CommandInterface[] $commands
     * @return HasCommandsTrait
     * @throws CommandException
     */
    public function addCommands($commands = array()){

        foreach ($commands as $command){

            if(!in_array(CommandInterface::class, class_implements($command)))
                throw new CommandException(sprintf('Command [%s] does not implement command interface', $command));

            $this->addCommand($command);

        }

        return $this;
    }

    /**
     * @param $definition
     * @return bool
     */
    public function hasCommand($definition){
        return array_key_exists($definition, $this->commands);
    }

    /**
     * @param Alarm $alarm
     * @param $definition
     * @param array $args
     * @throws CommandException
     */
    public function runCommand(Alarm $alarm, $definition, $args = array()){

        if(!$this->hasCommand($definition))
            throw new CommandException('Command [%s] not supported');

        /** @var CommandInterface $command */
        $command = $this->getCommand($definition);

        $command_string = sprintf($command::getCommandPattern(), $args);

        $alarm->send($command_string);

    }

    /**
     * @param CommandInterface $command
     * @return HasCommandsTrait
     */
    protected function addCommand($command){
        $this->commands[$command::getInternalDefinition()] = $command;

        return $this;
    }

    /**
     * @param $definition
     * @return CommandInterface
     */
    protected function getCommand($definition){
        return $this->commands[$definition];
    }

}
<?php

namespace AlarmControl\Traits;

use AlarmControl\Broker;
use AlarmControl\Messages\MessageInterface;
use AlarmControl\Exception\MessageException;

trait HasMessagesTrait {

    /** @var MessageInterface[] */
    protected $messages = [];

    /**
     * @param MessageInterface[] $messages
     * @return HasMessagesTrait
     * @throws MessageException
     */
    public function addMessages($messages = array()){

        foreach ($messages as $message){

            if(!in_array(MessageInterface::class, class_implements($message)))
                throw new MessageException(sprintf('Message [%s] does not implement message interface', $message));

            $this->addMessage($message);

        }

        return $this;
    }

    public function canHandleMessage($message){

        $has_handler = false;

        /** @var MessageInterface $m */
        foreach ($this->messages as $m){

            $has_handler = preg_match($m::getMessagePattern(), $message);

            if($has_handler == true){
                break;
            }
        }

        return $has_handler;

    }

    /**
     * @param Broker $broker
     * @param $message
     */
    public function executeHandler(Broker $broker, $message){

        $handler = $this->getMessageHandler($message);

        $matches = [];

        preg_match($handler::getMessagePattern(), $message, $matches);

        $params = [$handler::getInternalPath()];

        if(isset($matches['identifier'])){
            $params[] = $matches['identifier'];
        }

        $topic = call_user_func_array('sprintf', $params);

        $broker->send($topic, $handler::getInternalDefinition());

    }

    /**
     * @param MessageInterface $message
     * @return HasMessagesTrait
     */
    protected function addMessage($message){
        $this->messages[] = $message;

        return $this;
    }

    protected function getMessageHandler($message){

        $handler = null;

        /** @var MessageInterface $m */
        foreach ($this->messages as $m){

            $has_handler = preg_match($m::getMessagePattern(), $message);

            if($has_handler == true){
                $handler = $m;
            }
        }

        return $handler;

    }

}
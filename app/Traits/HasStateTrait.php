<?php

namespace AlarmControl\Traits;

use AlarmControl\Exception\LogicException;

trait HasStateTrait {

    protected $status = 'unknown';

    protected $status_options;

    abstract function getPossibleStatusOptions();

    public function setStatus($status){

        if(!in_array($status, $this->getPossibleStatusOptions()))
            throw new LogicException(
                sprintf('Attempted to set invalid status [%s], possible values [%s]',
                    $status, implode(', ', $this->getPossibleStatusOptions())));

        $this->status = $status;

        return $this;
    }

    public function getStatus(){
        return $this->getStatus();
    }

}
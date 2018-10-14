<?php

namespace AlarmControl;

use AlarmControl\Model\ModelInterface;
use AlarmControl\Traits\HasCommandsTrait;
use AlarmControl\Traits\HasMessagesTrait;
use Evenement\EventEmitter;
use React\EventLoop\LoopInterface;
use React\EventLoop\Timer\Timer;
use React\Socket\ConnectionInterface;
use React\Socket\Connector;

class Alarm extends EventEmitter {

    use HasMessagesTrait;
    use HasCommandsTrait;

    protected $url;

    /** @var ModelInterface */
    protected $model;

    /** @var ConnectionInterface */
    protected $connection;

    /** @var LoopInterface */
    protected $loop;

    /** @var Connector */
    protected $connector;

    /** @var Timer */
    protected $status_poll;

    /** @var Broker */
    protected $broker;

    public function __construct(LoopInterface $loop, ModelInterface $model, $url){

        $this->model = $model;
        $this->url = $url;

        $this->loop = $loop;

        $this->connector = new Connector($loop);

        $this->addMessages($this->model->getSupportedMessages());
        $this->addCommands($this->model->getSupportedCommands());

    }

    public function setBroker($broker){
        $this->broker = $broker;
    }

    public function connect(){

        $that = $this;

        $this->connector->connect($this->url)->then(function(ConnectionInterface $connection) use ($that){

            // Save for later!
            $that->setConnection($connection);

            $connection->once('data', function($data) use ($connection, $that){
                $established_message = trim($data);

                if($established_message == $that->model->getExpectedEstablishedMessage()){

                    $connection->on('data', function($data) use ($that){
                        $that->handleMessage($data);
                    });

                    $connection->write('STATUS');

                } else {
                    echo sprintf('Unknown established string [%s] received', $data);
                    exit();
                }
            });

            $that->status_poll = $that->loop->addPeriodicTimer($that->model->getKeepAliveTimeout(), function() use ($that, $connection){
                $connection->write($that->model->getStatusCommand());
            });

        });

    }

    public function send($command){
        $this->connection->write($command);
    }

    private function setConnection($connection)
    {
        $this->connection = $connection;
    }

    private function handleMessage($message){

        $message = trim($message);

        $has_handler = $this->canHandleMessage($message);

        if(in_array($message, $this->model->getIgnoreMessages())){
            // Ignore..
        } elseif($has_handler == true){
            $this->executeHandler($this->broker, $message);
        } else {
            echo sprintf("Can't handle message [%s] \n", $message);
        }

    }


    private function handleError($message){

        echo sprintf("Error: %s\n", $message);

    }




}
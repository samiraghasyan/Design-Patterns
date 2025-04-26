<?php

abstract class Handler{

    protected ?Handler $next = null;


    public function setNext(Handler $handler): ?Handler
    {
        $this->next = $handler;
        return $handler;
    }

    public function handle(array $data): ?string
    {
        $error = $this->validate($data);
        if($error !== null){
            return $error;
        }

        return $this->next?->handle($data);

    }



    abstract protected function validate(array $data): ?string;



}
<?php

class Box
{

    protected $id, $posX, $posY, $posZ, $type;

    function __construct(int $id, int $posX, int $posY, int $posZ, int $type)
    {
        $this->id = $id;
        $this->posX = $posX;
        $this->posY = $posY;
        $this->posZ = $posZ;
        $this->type = $type;
    }
}
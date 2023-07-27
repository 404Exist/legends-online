<?php


namespace GameBackend\Entity\Game;


interface ItemInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @return RefItemInterface
     */
    public function getRefItem();

}
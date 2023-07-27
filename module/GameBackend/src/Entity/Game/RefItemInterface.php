<?php


namespace GameBackend\Entity\Game;


interface RefItemInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getIconPath();

    /**
     * @return int
     */
    public function getLevel();

}
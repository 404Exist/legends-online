<?php


namespace GameBackend\Entity\Game;


interface InventoryInterface
{
    /**
     * @return CharacterInterface
     */
    public function getCharacter();

    /**
     * @return int
     */
    public function getSlot();

    /**
     * @return ItemInterface
     */
    public function getItem();

}
<?php


namespace GameBackend\Entity\Game;


interface CharacterInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return int
     */
    public function getLevel();

    /**
     * @return null|GuildInterface
     */
    public function getGuild();
}
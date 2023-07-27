<?php


namespace GameBackend\Entity\Game;


interface GuildInterface
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
     * @return GuildMemberInterface[]
     */
    public function getMemberList();
}
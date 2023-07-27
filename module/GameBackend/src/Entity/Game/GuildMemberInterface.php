<?php


namespace GameBackend\Entity\Game;


interface GuildMemberInterface
{
    /**
     * @return null|GuildInterface
     */
    public function getGuild();

    /**
     * @return null|CharacterInterface
     */
    public function getCharacter();

    /**
     * @return \DateTime
     */
    public function getJoinDate();

}
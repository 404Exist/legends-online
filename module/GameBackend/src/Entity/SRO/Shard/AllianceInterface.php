<?php

namespace GameBackend\Entity\SRO\Shard;

use GameBackend\Entity\Game\GuildInterface;

interface AllianceInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id): self;

    /**
     * @return GuildInterface
     */
    public function getMasterGuild(): GuildInterface;

    /**
     * @param GuildInterface $masterGuild
     *
     * @return $this
     */
    public function setMasterGuild(?GuildInterface $masterGuild): self;

    /**
     * @return GuildInterface|null
     */
    public function getGuild2(): ?GuildInterface;

    /**
     * @param GuildInterface|null $guild2
     *
     * @return $this
     */
    public function setGuild2(?GuildInterface $guild2): self;

    /**
     * @return GuildInterface|null
     */
    public function getGuild3(): ?GuildInterface;

    /**
     * @param GuildInterface|null $guild3
     *
     * @return $this
     */
    public function setGuild3(?GuildInterface $guild3): self;

    /**
     * @return GuildInterface|null
     */
    public function getGuild4(): ?GuildInterface;

    /**
     * @param GuildInterface|null $guild4
     *
     * @return $this
     */
    public function setGuild4(?GuildInterface $guild4): self;

    /**
     * @return GuildInterface|null
     */
    public function getGuild5(): ?GuildInterface;

    /**
     * @param GuildInterface|null $guild5
     *
     * @return $this
     */
    public function setGuild5(?GuildInterface $guild5): self;

    /**
     * @return GuildInterface|null
     */
    public function getGuild6(): ?GuildInterface;

    /**
     * @param GuildInterface|null $guild6
     *
     * @return $this
     */
    public function setGuild6(?GuildInterface $guild6): self;

    /**
     * @return GuildInterface|null
     */
    public function getGuild7(): ?GuildInterface;

    /**
     * @param GuildInterface|null $guild7
     *
     * @return $this
     */
    public function setGuild7(?GuildInterface $guild7): self;

    /**
     * @return GuildInterface|null
     */
    public function getGuild8(): ?GuildInterface;

    /**
     * @param GuildInterface|null $guild8
     *
     * @return $this
     */
    public function setGuild8(?GuildInterface $guild8): self;

}
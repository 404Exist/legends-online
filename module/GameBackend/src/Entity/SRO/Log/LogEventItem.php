<?php

namespace GameBackend\Entity\SRO\Log;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * OnlineOffline
 *
 * @ORM\Table(name="_LogEventItem")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Log\Repository\LogEventItem")
 */
class LogEventItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CharID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $charId = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemRefID", type="integer", nullable=false)
     */
    private $itemRefID = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="dwData", type="integer", nullable=false)
     */
    private $dwData = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="TargetStorage", type="integer", nullable=false)
     */
    private $targetStorage = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="Operation", type="integer", nullable=false)
     */
    private $operation = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="Slot_From", type="integer", nullable=false)
     */
    private $slotFrom = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="Slot_To", type="integer", nullable=false)
     */
    private $slotTo = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EventPos", type="string", length=64, nullable=true)
     */
    private $eventPos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="strDesc", type="string", length=128, nullable=true)
     */
    private $strDesc;

    /**
     * @var integer
     *
     * @ORM\Column(name="Serial64", type="bigint", nullable=false)
     */
    private $serial64 = 0;

    /**
     * @var integer|null
     *
     * @ORM\Column(name="Gold", type="bigint", nullable=true)
     */
    private $gold;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="EventTime", type="datetime", nullable=false)
     */
    private $eventTime;

    /**
     * LogEventChar constructor.
     */
    public function __construct()
    {
        $this->eventTime = new DateTime();
    }

    /**
     * @return int
     */
    public function getCharId(): int
    {
        return $this->charId;
    }

    /**
     * @param int $charId
     * @return $this
     */
    public function setCharId(int $charId): LogEventItem
    {
        $this->charId = $charId;
        return $this;
    }

    /**
     * @return int
     */
    public function getItemRefID(): int
    {
        return $this->itemRefID;
    }

    /**
     * @param int $itemRefID
     * @return $this
     */
    public function setItemRefID(int $itemRefID): LogEventItem
    {
        $this->itemRefID = $itemRefID;
        return $this;
    }

    /**
     * @return int
     */
    public function getDwData(): int
    {
        return $this->dwData;
    }

    /**
     * @param int $dwData
     * @return $this
     */
    public function setDwData(int $dwData): LogEventItem
    {
        $this->dwData = $dwData;
        return $this;
    }

    /**
     * @return int
     */
    public function getTargetStorage(): int
    {
        return $this->targetStorage;
    }

    /**
     * @param int $targetStorage
     * @return $this
     */
    public function setTargetStorage(int $targetStorage): LogEventItem
    {
        $this->targetStorage = $targetStorage;
        return $this;
    }

    /**
     * @return int
     */
    public function getOperation(): int
    {
        return $this->operation;
    }

    /**
     * @param int $operation
     * @return $this
     */
    public function setOperation(int $operation): LogEventItem
    {
        $this->operation = $operation;
        return $this;
    }

    /**
     * @return int
     */
    public function getSlotFrom(): int
    {
        return $this->slotFrom;
    }

    /**
     * @param int $slotFrom
     * @return $this
     */
    public function setSlotFrom(int $slotFrom): LogEventItem
    {
        $this->slotFrom = $slotFrom;
        return $this;
    }

    /**
     * @return int
     */
    public function getSlotTo(): int
    {
        return $this->slotTo;
    }

    /**
     * @param int $slotTo
     * @return $this
     */
    public function setSlotTo(int $slotTo): LogEventItem
    {
        $this->slotTo = $slotTo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEventPos(): ?string
    {
        return $this->eventPos;
    }

    /**
     * @param string|null $eventPos
     * @return $this
     */
    public function setEventPos(?string $eventPos): LogEventItem
    {
        $this->eventPos = $eventPos;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStrDesc(): ?string
    {
        return $this->strDesc;
    }

    /**
     * @param string|null $strDesc
     * @return $this
     */
    public function setStrDesc(?string $strDesc): LogEventItem
    {
        $this->strDesc = $strDesc;
        return $this;
    }

    /**
     * @return int
     */
    public function getSerial64(): int
    {
        return $this->serial64;
    }

    /**
     * @param int $serial64
     * @return $this
     */
    public function setSerial64(int $serial64): LogEventItem
    {
        $this->serial64 = $serial64;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getGold(): ?int
    {
        return $this->gold;
    }

    /**
     * @param int|null $gold
     * @return $this
     */
    public function setGold(?int $gold): LogEventItem
    {
        $this->gold = $gold;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getEventTime(): DateTime
    {
        return $this->eventTime;
    }

    /**
     * @param DateTime $eventTime
     * @return $this
     */
    public function setEventTime(DateTime $eventTime): LogEventItem
    {
        $this->eventTime = $eventTime;
        return $this;
    }

}
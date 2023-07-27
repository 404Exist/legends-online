<?php

namespace GameBackend\Entity\SRO\Log;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * OnlineOffline
 *
 * @ORM\Table(name="_LogEventChar")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Log\Repository\LogEventChar")
 */
class LogEventChar
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
     * @ORM\Column(name="EventID", type="integer", nullable=false)
     */
    private $eventId = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="Data1", type="integer", nullable=false)
     */
    private $data1 = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="Data2", type="integer", nullable=false)
     */
    private $data2 = 0;

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
    public function setCharId(int $charId): LogEventChar
    {
        $this->charId = $charId;
        return $this;
    }

    /**
     * @return int
     */
    public function getEventId(): int
    {
        return $this->eventId;
    }

    /**
     * @param int $eventId
     * @return $this
     */
    public function setEventId(int $eventId): LogEventChar
    {
        $this->eventId = $eventId;
        return $this;
    }

    /**
     * @return int
     */
    public function getData1(): int
    {
        return $this->data1;
    }

    /**
     * @param int $data1
     * @return $this
     */
    public function setData1(int $data1): LogEventChar
    {
        $this->data1 = $data1;
        return $this;
    }

    /**
     * @return int
     */
    public function getData2(): int
    {
        return $this->data2;
    }

    /**
     * @param int $data2
     * @return $this
     */
    public function setData2(int $data2): LogEventChar
    {
        $this->data2 = $data2;
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
    public function setEventPos(?string $eventPos): LogEventChar
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
    public function setStrDesc(?string $strDesc): LogEventChar
    {
        $this->strDesc = $strDesc;
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
    public function setEventTime(DateTime $eventTime): LogEventChar
    {
        $this->eventTime = $eventTime;
        return $this;
    }

}
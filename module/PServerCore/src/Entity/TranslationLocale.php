<?php
declare(strict_types=1);

namespace PServerCore\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use PServerCore\Keys\Caching;
use PServerCore\Service\ServiceManager;

/**
 * TranslationLocale
 * @ORM\Table(name="translation_locale")
 * @ORM\Entity(repositoryClass="PServerCore\Entity\Repository\TranslationLocale")
 */
class TranslationLocale
{
    /**
     * @var integer|null
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="locale", type="string", length=255, nullable=false)
     */
    private $locale = '';

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name = '';

    /**
     * @var int
     * @ORM\Column(name="active", type="smallint", nullable=false)
     */
    private $active = 0;

    /**
     * @var DateTime
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * TranslationLocale constructor.
     */
    public function __construct()
    {
        $this->created = new DateTime();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return $this
     */
    public function setId(?int $id): TranslationLocale
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return $this
     */
    public function setLocale(string $locale): TranslationLocale
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): TranslationLocale
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getActive(): int
    {
        return $this->active;
    }

    /**
     * @param int $active
     * @return $this
     */
    public function setActive(int $active): TranslationLocale
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     * @return $this
     */
    public function setCreated(DateTime $created): TranslationLocale
    {
        $this->created = $created;
        return $this;
    }

}
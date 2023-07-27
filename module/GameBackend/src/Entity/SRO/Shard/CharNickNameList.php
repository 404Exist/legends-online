<?php


namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;

/**
 * CharNickNameList
 *
 * @ORM\Table(name="_CharNickNameList")
 * @ORM\Entity()
 */
class CharNickNameList
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(name="NickName16", type="string", length=17, nullable=false)
     */
    private $nickName = '';

    /**
     * @var Character
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Character")
     * @ORM\JoinColumn(name="CharID", referencedColumnName="CharID")
     **/
    private $char;

    /**
     * @return string
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @param string $nickName
     * @return self
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;
        return $this;
    }

    /**
     * @return Character
     */
    public function getChar()
    {
        return $this->char;
    }

    /**
     * @param Character $char
     * @return self
     */
    public function setChar($char)
    {
        $this->char = $char;
        return $this;
    }
}

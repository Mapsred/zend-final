<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 06/12/2017
 * Time: 14:24
 */

namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Organization
 *
 * @ORM\Table(name="organization")
 * @ORM\Entity(repositoryClass="Application\Repository\OrganizationRepository")
 */
class Organization
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var User $leader
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\User", inversedBy="organizations", cascade={"persist"})
     * @ORM\JoinColumn(name="leader", referencedColumnName="id", nullable=true)
     */
    private $leader;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Organization
     */
    public function setId(int $id): Organization
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Organization
     */
    public function setName($name): Organization
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return User
     */
    public function getLeader()
    {
        return $this->leader;
    }

    /**
     * @param User $leader
     * @return Organization
     */
    public function setLeader($leader): Organization
    {
        $this->leader = $leader;

        return $this;
    }

    /**
     * @return Meetup[]|ArrayCollection
     */
    public function getMeetups()
    {
        return $this->leader->getOrganizedMeetups();
    }
}

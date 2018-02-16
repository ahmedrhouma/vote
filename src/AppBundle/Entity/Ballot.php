<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ballot
 *
 * @ORM\Table(name="ballot", indexes={@ORM\Index(name="fk_Ballot_Event_idx", columns={"Event_id"})})
 * @ORM\Entity
 */
class Ballot
{
    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=45, nullable=true)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="Label", type="string", length=45, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Event
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Event_id", referencedColumnName="id")
     * })
     */
    private $event;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Elector", mappedBy="ballot")
     */
    private $elector;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->elector = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set language
     *
     * @param string $language
     *
     * @return Ballot
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Ballot
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Ballot
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set event
     *
     * @param \AppBundle\Entity\Event $event
     *
     * @return Ballot
     */
    public function setEvent(\AppBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \AppBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Add elector
     *
     * @param \AppBundle\Entity\Elector $elector
     *
     * @return Ballot
     */
    public function addElector(\AppBundle\Entity\Elector $elector)
    {
        $this->elector[] = $elector;

        return $this;
    }

    /**
     * Remove elector
     *
     * @param \AppBundle\Entity\Elector $elector
     */
    public function removeElector(\AppBundle\Entity\Elector $elector)
    {
        $this->elector->removeElement($elector);
    }

    /**
     * Get elector
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getElector()
    {
        return $this->elector;
    }
    public function __toString() {
        return $this->language;
      }
}

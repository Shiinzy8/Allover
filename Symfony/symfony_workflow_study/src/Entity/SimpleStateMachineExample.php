<?php

// /src/AppBundle/Entity/SimpleStateMachineExample.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SimpleStateMachineExample
 *
 * @ORM\Table(name="simple_state_machine_example")
 * @ORM\Entity()
 */
class SimpleStateMachineExample
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="marking", type="string", length=255)
     */
    private $marking;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMarking()
    {
        return $this->marking;
    }

    /**
     * @param string $marking
     *
     * @return SimpleStateMachineExample
     */
    public function setMarking($marking)
    {
        $this->marking = $marking;

        return $this;
    }
}
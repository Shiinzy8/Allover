<?php

// /src/AppBundle/Entity/SimpleStateMachineExample.php

namespace AppBundle\Entity;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
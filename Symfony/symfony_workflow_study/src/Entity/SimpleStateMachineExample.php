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
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return SimpleStateMachineExample
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

//    // we comment it because in workflow.yaml we add marking_store option and new field to watch on
//    /**
//     * @var string
//     *
//     * @ORM\Column(name="marking", type="string", length=255)
//     */
//    private $marking;
//
//    /**
//     * @return string
//     */
//    public function getMarking()
//    {
//        return $this->marking;
//    }
//
//    /**
//     * @param string $marking
//     *
//     * @return SimpleStateMachineExample
//     */
//    public function setMarking($marking)
//    {
//        $this->marking = $marking;
//
//        return $this;
//    }
}
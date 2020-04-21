<?php

namespace App\Controller;

use App\Entity\SimpleStateMachineExample;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Workflow\Exception\LogicException;
use Symfony\Component\Workflow\StateMachine;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, StateMachine $stateMachine)
    {
        $entity = new SimpleStateMachineExample();
//        $entity->setMarking('b'); // change place by hardcode

        $transitions['can_start'] = $stateMachine->can($entity, 'start');
        $transitions['can_end'] = $stateMachine->can($entity, 'end');

        // interesting things here

        return $this->render('index.html.twig',
            ['transitions' => $transitions]
        );
    }
}
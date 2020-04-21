<?php

namespace App\Controller;

use App\Entity\SimpleStateMachineExample;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Workflow\Exception\LogicException;
use Symfony\Component\Workflow\StateMachine;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
//    private $stateMachine;
//
//    public function __construct(StateMachine $stateMachine)
//    {
//        $this->stateMachine = $stateMachine;
//    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, StateMachine $stateMachine)
    {
        $entity = new SimpleStateMachineExample();
        $one = $stateMachine;

//        var_dump($one);die;

        $transitions['can_start'] = $stateMachine->can($entity, 'start');
        $transitions['can_end'] = $stateMachine->can($entity, 'end');

        // interesting things here

        return $this->render('index.html.twig',
            ['transitions' => $transitions]
        );
    }
}
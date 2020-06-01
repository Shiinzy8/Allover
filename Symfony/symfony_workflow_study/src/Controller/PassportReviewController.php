<?php

namespace App\Controller;

use App\Entity\Customer;
use LogicException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Workflow\Exception\LogicException;
use Symfony\Component\Workflow\StateMachine;

/**
 * Class PassportReviewController
 * @package App\Controller
 */
class PassportReviewController extends AbstractController
{
    /**
     * @Route("/approve/{id}", name="manual_passport_approve")
     * @throws LogicException
     */
    public function manuallyApprovePassportAction(Request $request, $id)
    {
        $passport = $this->getDoctrine()
            ->getRepository('App:Customer')
            ->find($id)
        ;

        try {
            $this
                ->get('workflow.customer_signup')
                ->apply($passport, 'manual_passport_approval')
            ;

            // *** DON'T FORGET TO FLUSH!!! ***
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Approved');

        } catch (LogicException $e) {

            $this->addFlash('danger', sprintf('No, that did not work: %s', $e->getMessage()));

        }

        return $this->redirectToRoute('passport_review');
    }


}
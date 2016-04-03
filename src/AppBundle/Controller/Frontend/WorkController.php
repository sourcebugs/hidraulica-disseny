<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class WorkController
 *
 * @category Controller
 * @package  AppBundle\Controller\Frontend
 * @author   Anton Serra <aserratorta@gmail.com>
 *
 */
class WorkController extends Controller
{
    /**
     * @Route("/works/{page}/", name="app_work_list", options={"i18n_prefix" = "secure"})
     *
     * @param int $page
     * @return Response
     */
    public function workListAction($page = 1)
    {
        $paginator = $this->get('knp_paginator');
        $works = $paginator->paginate(
            $this->getDoctrine()->getRepository('AppBundle:Work')->findAllEnabledSortedByDate(),
            $page,
            9
        );

        return $this->render(
            ':Frontend/Work:index.html.twig',
            [ 'works' => $works ]
        );
    }

    /**
     * @Route("/work/{slug}/", name="app_work_detail", options={"i18n_prefix" = "secure"})
     * @param $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function workDetailAction($slug)
    {
        $work = $this->getDoctrine()->getRepository('AppBundle:Work')->findOneBy(
            array(
                'slug' => $slug,
            )
        );

        if ($work->getEnabled() == false && !$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        return $this->render(
            ':Frontend/Work:show.html.twig',
            [ 'work' => $work ]
        );
    }
}

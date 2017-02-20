<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends BaseController
{
    public function loginAction(Request $request)
    {
    	  return parent::loginAction($request);
    }

    public function renderLogin(array $data)
    {
        // $request = $this->container->get('request');
				// $routeName = $request->get('_route');
				// if ($routeName) {
				// 	return $this->render("AppBundle::index.html.twig", $data);
				// } else {
				// }
        return $this->render("AppBundle:Security:login.html.twig", $data);
    }
}
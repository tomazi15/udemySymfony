<?php
/**
 * Created by PhpStorm.
 * User: tomasz.koprowski
 * Date: 04/05/2016
 * Time: 15:52
 */

namespace Blog\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends  Controller
{
    public function loginAction()
    {
        $request = $this->getRequest();
        $postData = $request->request->get('');
        $session = $request->getSession();

        //get login error if there is one
        if ( $request->attributes->has(SecurityContext::AUTHENTICATION_ERROR) ) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
    }
} 
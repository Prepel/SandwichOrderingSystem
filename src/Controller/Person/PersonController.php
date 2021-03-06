<?php
namespace Controller\Person;

use Domain\Person\Person;
use Domain\Util\Name;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonController
{
    /**
     * @param Request $request
     * @param $personName
     *
     * @return static
     */
    public function registerPerson(Request $request, $personName)
    {
        if(($request->get('personName'))){
            $person = new Person(new Name($personName));
        }

        if($person instanceof Person){

            $cookie = new Cookie("username", $person->getName()->getName());
            $response = Response::create('', 302, array("Location" => "/orderPage/1"));
            $response->headers->setCookie($cookie);
            return $response;
        }
    }

    public function verifyLoggedIn(Request $request)
    {
        if($request->cookies->get('username')){
            return null;
        } else {
            return Response::create('', 302, array("Location" => "/login"));
        }
    }
}

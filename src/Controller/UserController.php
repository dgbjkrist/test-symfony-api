<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\User;

class UserController extends AbstractController
{

    /**
     * [register description]
     * @param  Request                      $request [description]
     * @param  UserPasswordEncoderInterface $encoder [description]
     * @param  EntityManagerInterface       $em      [description]
     * @return JsonResponse                                [description]
     * @Route("/register", methods={"POST"})
     */
    public function register(Request $request,
        SerializerInterface $serializer,
        UserPasswordEncoderInterface $encoder,
        EntityManagerInterface $em):JsonResponse
    {

        $datas = $request->getContent();
        $pwd=json_decode($datas);
        $pwd= $pwd->password;


        $datauser = $serializer->deserialize($datas, User::class, 'json');

        $datauser->setPassword($encoder->encodePassword($datauser, $pwd));

        $em->persist($datauser);

        $em->persist($datauser);

        $em->flush();

        $response=$this->json($datauser, 201, [], ['groups'=>'get:parcels']);

        return $response;
        
    }
}

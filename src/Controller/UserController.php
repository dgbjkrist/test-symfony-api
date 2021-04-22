<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use \Exception as Exception;

class UserController extends AbstractController
{

    /**
     * [register description]
     * @param  Request                      $request [description]
     * @param  UserPasswordEncoderInterface $encoder [description]
     * @param  EntityManagerInterface       $em      [description]
     * @return JsonResponse                                [description]
     * @Route("/users", methods={"POST"})
     */
    public function register(Request $request,
        SerializerInterface $serializer,
        UserPasswordEncoderInterface $encoder,
        EntityManagerInterface $em,
        ValidatorInterface $validator):JsonResponse
    {

        $datas = $request->getContent();
        try {
            $pwd=json_decode($datas);
            $pwd= $pwd->password;


            $datauser = $serializer->deserialize($datas, User::class, 'json');

            $datauser->setPassword($encoder->encodePassword($datauser, $pwd));

            $em->persist($datauser);

            $em->flush();

            $response=$this->json([
                'message'=>'successfully, vous pouvez demander un token',
                'data'=>$datas], 201, [], ['groups'=>'getparcel']);

            return $response;
        } catch (Exception $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }
        
    }
}

<?php

namespace App\Controller;

use App\Repository\ParcelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ParcelController extends AbstractController
{
    /**
     * @Route("/parcel", name="parcel")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ParcelController.php',
        ]);
    }

    /**
     * @Route("/parcels", methods="GET")
     * @return Json
     */
    public function getParcels(ParcelRepository $parcelRepo):JsonResponse
    {
        # code...
        $parcels = $parcelRepo->findAll();
        $response = $this->json($parcels, 200, [], ['groups'=>'get:parcels']);
        return $response;
        // dump($data);
        // return new JsonResponse(
        //     $serialize->serialize($data, "json", ["groups" => "get"]),
        //     JsonResponse::HTTP_OK,
        //     [],
        //     true
        // );
    }

    /**
     * @Route("/parcels/{id}", methods="GET")
     * @param  ParcelRepository $parcelRepo [description]
     * @param  [type]           $id         [description]
     * @return JsonResponse description
     */
    public function getParcel(ParcelRepository $parcelRepo, $id):JsonResponse
    {
        $parcel = $parcelRepo->find($id);
        $response = $this->json($parcel, 200, [], ['groups'=>'get:parcels']);
        return $response;
    }
}

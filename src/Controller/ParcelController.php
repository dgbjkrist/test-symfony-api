<?php

namespace App\Controller;

use App\Repository\ParcelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;

class ParcelController extends AbstractController
{

    /**
     * @Route("/parcels", methods="GET")
     * @return Json
     */
    public function getParcels(ParcelRepository $parcelRepo, SerializerInterface $serializer):JsonResponse
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
     * @OA\Get(
     *     path="/parcels/{id}",
     *     @OA\Response(
     *         response="200",
     *         description="retourne une ressource",
     *         @OA\JsonContent(
     *             type="string"
     *         )
     *     )
     * )
     */
    public function getParcel(ParcelRepository $parcelRepo, $id):JsonResponse
    {
        $parcel = $parcelRepo->find($id);
        $response = $this->json($parcel, 200, [], ['groups'=>'get:parcels']);
        return $response;
    }
}

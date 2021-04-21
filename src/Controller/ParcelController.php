<?php

namespace App\Controller;

use App\Repository\ParcelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

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
     * @return JsonResponse
     */
    public function getParcels(ParcelRepository $parcelRepo):JsonResponse
    {
        # code...
        $data = $parcelRepo->findAll();
        return new JsonResponse($data);
    }
}

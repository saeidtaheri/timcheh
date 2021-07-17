<?php

namespace App\Controller;

use App\Service\NotificationService;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotificationController
{
    /**
     * @Route("/", name="send_notification_route", methods={"POST"})
     */
    public function index(NotificationService $notificationService, Request $request): Response
    {
        $message = $request->get('message');
        $users = ['saeid', 'ahmad'];

        if (!$notificationService->send($message, $users)) {
            return new JsonResponse([
                'message' => 'unable to send messages.'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse([
            'message' => 'messages sent successfully.'
        ], Response::HTTP_OK);
    }
}
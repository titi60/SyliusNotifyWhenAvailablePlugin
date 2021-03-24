<?php

declare(strict_types=1);

namespace Titi60\SyliusNotifyWhenAvailablePlugin\Controller;

use Titi60\SyliusNotifyWhenAvailablePlugin\Entity\NotificationList;
use Titi60\SyliusNotifyWhenAvailablePlugin\Entity\NotificationListItem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class GravitaController extends Controller
{
    public function ajaxAddToNotificationListAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new BadRequestHttpException('Action only allowed by AJAX');
        }

        try {
            $form = $request->request->get('gravita');
            if ($this->isCsrfTokenValid('add-to-list', $form['_token'])) {
                $notificationListRepository = $this->get('gravita.repository.notification_list');
                /** @var NotificationList $notificationList */
                $notificationList = $notificationListRepository->findOneBy(['productVariant' => $form['variant-id']]);
                if (!$notificationList) {
                    $productVariant = $this->get('sylius.repository.product_variant')->find($form['variant-id']);
                    $notificationListFactory = $this->get('gravita.factory.notification_list');
                    $notificationList = $notificationListFactory->createNew();

                    $notificationList->setProductVariant($productVariant);
                }

                $notificationListItemRepository = $this->get('gravita.repository.notification_list_item');
                /** @var NotificationListItem $notificationListItem */
                $notificationListItem = $notificationListItemRepository->findOneBy([
                    'notificationList' => $notificationList,
                    'email' => $form['notification-email']
                ]);
                if (!$notificationListItem) {
                    $notificationListItemFactory = $this->get('gravita.factory.notification_list_item');
                    $notificationListItem = $notificationListItemFactory->createNew();

                    $notificationListItem->setNotified(false);
                    $notificationListItem->setEmail($form['notification-email']);

                    $notificationList->addItem($notificationListItem);
                    $notificationListRepository->add($notificationList);

                    $response = new JsonResponse([
                        'message' => $this->get('translator')->trans('gravita.notification_list_item.created', ['%email%' => $notificationListItem->getEmail()]),
                        'error' => false,
                    ], Response::HTTP_CREATED);
                } else {
                    $response = new JsonResponse([
                        'message' => $this->get('translator')->trans('gravita.notification_list_item.exists', ['%email%' => $notificationListItem->getEmail()])
                    ], Response::HTTP_FOUND);
                }


            }  else {
                $response = new JsonResponse([
                    'message' => 'CSRF token is not valid',
                    'error' => true,
                ], Response::HTTP_NOT_ACCEPTABLE);
            }
        } catch (\Exception $ex) {
            $response = new JsonResponse([
               'message' => $ex->getMessage(),
               'error' => true,
            ], Response::HTTP_BAD_REQUEST);
        }

        return $response;
    }
}

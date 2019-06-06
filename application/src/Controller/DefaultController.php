<?php

namespace App\Controller;

use App\Domain\Order\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * DefaultController constructor.
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->redirect('/dist/index.html');
    }

    public function post(Request $request)
    {
        $params = json_decode($request->getContent(), true);
        try {
            $order = $this->orderService->post($params);
        } catch(\Exception $exception) {
            return $this->json($exception->getMessage());
        }
        return $this->json($order->toArray());
    }

    public function get(string $id)
    {
        try {
            $order = $this->orderService->get(intval($id));
        } catch(\Exception $exception) {
            return $this->json($exception->getMessage());
        }
        return $this->json($order->toArray());
    }

    public function put(Request $request, string $id)
    {
        $params = json_decode($request->getContent(), true);
        $params['id'] = intval($id);
        try {
            $order = $this->orderService->put($params);
        } catch(\Exception $exception) {
            return $this->json($exception->getMessage());
        }
        return $this->json($order->toArray());
    }

    public function all(Request $request)
    {
        $result = [];
        try {
            $orders = $this->orderService->all(intval($request->get('offset')), intval($request->get('limit')));
            foreach ($orders as $order) {
                $result[] = $order->toArray();
            }
        } catch(\Exception $exception) {
            return $this->json($exception->getMessage());
        }
        return $this->json($result);
    }
}

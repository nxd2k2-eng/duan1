<?php
require_once __DIR__ . '/../../Models/Order.php';

class OrderController
{
    private $order;

    public function __construct()
    {
        $this->order = new Order();
    }

    public function index()
    {
        $orders = $this->order->getAllWithDetails();
        require_once __DIR__ . '/../../SrcCatGiaoDien/admin/View/pages/order/list.php';
    }

    public function detail($id)
    {
        $order = $this->order->find($id);
        $items = $this->order->getOrderItems($id);
        require_once __DIR__ . '/../../SrcCatGiaoDien/admin/View/pages/order/detail.php';
    }

    public function updateStatus($id)
    {
        if ($_POST) {
            $this->order->update($id, ['status' => $_POST['status']]);
            header('Location: index.php?page=admin&action=order');
            exit;
        }
    }
}
?>
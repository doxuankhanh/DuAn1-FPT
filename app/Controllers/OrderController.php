<?php

class OrderController {

    use Controller;
    private $statusOrder;
    private $order;
    function __construct()
    {
        $this->order = $this->model("OrderModel");
        $this->statusOrder = $this->model("StatusOrderModel");
    }
    function detailOrder($orderID) {
        $order = $this->order->detailOrder($orderID);
        $this->view("admin.layout.Components.Orders.detailOrder",
        [
            'order' => $order,
            'statusOrders' => $this->statusOrder->all(),
        ]
    );
    }
    // update status order
    function updateStatusOrder($orderID) {
        $_POST = filter_input_array(INPUT_POST);
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            if(isset($_POST['updateStatus'])) {
                $data = [
                    'statusID' => trim($_POST['statusID'] ?? ''),
                ];
                $result = $this->order->updateStatus(status:$data['statusID'],orderID:$orderID);
                if($result) {
                    _redirectLo($_SERVER['HTTP_REFERER']);
                }else {
                    return false;
                }
            }
        }
    }
}
?>
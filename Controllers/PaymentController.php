<?php
// require_once 'Models/OrderModel.php';
require_once 'BaseController.php';

class PaymentController extends BaseController
{

    function payment()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        

        $this->view( '/payment/payment');
    }

   
}
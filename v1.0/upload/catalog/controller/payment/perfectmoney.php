<?php
class ControllerPaymentPerfectMoney extends Controller {
    public function index() {
        $data['button_confirm'] = $this->language->get('button_confirm');

        $this->load->model('checkout/order');

        $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

        $data['perfectmoney_payee_account'] = $this->config->get("perfectmoney_payee_account");
        $data['perfectmoney_payee_name'] = $this->config->get("perfectmoney_payee_name");
        $data['perfectmoney_payee_name'] = $this->config->get("perfectmoney_payee_name");

        $data['perfectmoney_memo'] = "";
        if($this->config->get("perfectmoney_memo_ip")){
            $data['perfectmoney_memo'] .= "IP_".($_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']))."_";
        }
        if($this->config->get("perfectmoney_memo_order_id")){
            $data['perfectmoney_memo'] .= "OrderID_".$this->session->data['order_id'];
        }

        $data['order_id'] = $this->session->data['order_id'];
        $data['order_total'] = number_format((float)$order_info['total'], 2, '.', '');
        $data['action'] = 'https://perfectmoney.is/api/step1.asp';

        $data['currency'] = 'USD';
        if($data['perfectmoney_payee_account'][0] == 'E'){
            $data['currency'] = 'EUR';
        }
        else if($data['perfectmoney_payee_account'][0] == 'G'){
            $data['currency'] = 'OAU';
        }
        if($data['currency'] != 'USD'){
            $exchange_rate = $this->currency->getValue($data['currency']);
            $data['order_total'] = number_format((float)$this->currency->format($data['order_total'] , $data['currency'], $exchange_rate), 2, '.', '');
        }

        $data['status_url'] = $this->url->link('payment/perfectmoney/callback', '', 'SSL');
        $data['success_url'] = $this->url->link('checkout/success', '', 'SSL');
        $data['nopayment_url'] = $this->url->link('checkout/checkout', '', 'SSL');

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/perfectmoney.tpl')) {
            return $this->load->view($this->config->get('config_template') . '/template/payment/perfectmoney.tpl', $data);
        } else {
            return $this->load->view('default/template/payment/perfectmoney.tpl', $data);
        }
    }

    public function callback() {

        if(isset($this->request->post['V2_HASH'])){
            $passphrase = base64_decode($this->config->get("perfectmoney_passphrase"));
            $secret = $this->request->post['PAYMENT_ID'].":".
                $this->request->post['PAYEE_ACCOUNT'].":".
                $this->request->post['PAYMENT_AMOUNT'].":".
                $this->request->post['PAYMENT_UNITS'].":".
                $this->request->post['PAYMENT_BATCH_NUM'].":".
                $this->request->post['PAYER_ACCOUNT'].":".
                strtoupper(md5($passphrase)).":".
                $this->request->post['TIMESTAMPGMT'];

            if (strtoupper(md5($secret)) == $this->request->post['V2_HASH']) {
                $this->load->model('checkout/order');

                $this->model_checkout_order->addOrderHistory($this->request->post['PAYMENT_ID'], $this->config->get('config_order_status_id'));
            }
        }
    }
}
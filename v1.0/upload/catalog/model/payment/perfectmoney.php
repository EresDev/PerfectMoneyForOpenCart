<?php
class ModelPaymentPerfectMoney extends Model {
    public function getMethod($address, $total) {
        $this->load->language('payment/perfectmoney');

        $minimum = $this->config->get('perfectmoney_minimum_amount');
        $maximum = $this->config->get('perfectmoney_maximum_amount');

        if ( ((float)$minimum) > $total) {
            $status = false;
        } elseif ( ((float)$maximum) == 0.0 || (((float)$maximum) >= ((float)$total))) {
            $status = true;

        } else {
            $status = false;
        }

        $method_data = array();

        if ($status) {
            $method_data = array(
                'code'       => 'perfectmoney',
                'title'      => $this->language->get('text_title'),
                'terms'      => '',
                'sort_order' => $this->config->get('perfectmoney_sort_order')
            );
        }

        return $method_data;
    }
}
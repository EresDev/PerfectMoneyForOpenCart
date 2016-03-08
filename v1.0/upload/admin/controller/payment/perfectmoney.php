<?php
class ControllerPaymentPerfectMoney extends Controller {
    private $error = array();

    public function index() {
        $this->load->language('payment/perfectmoney');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->request->post['perfectmoney_passphrase'] = base64_encode($this->request->post['perfectmoney_passphrase']);
            $this->model_setting_setting->editSetting('perfectmoney', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
        }

        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_all_zones'] = $this->language->get('text_all_zones');
        $data['text_pay'] = $this->language->get('text_pay');

        $data['entry_payee_account'] = $this->language->get('entry_payee_account');
        $data['entry_payee_account_info'] = $this->language->get('entry_payee_account_info');
        $data['entry_passphrase'] = $this->language->get('entry_passphrase');
        $data['entry_passphrase_info'] = $this->language->get('entry_passphrase_info');
        $data['entry_payee_name'] = $this->language->get('entry_payee_name');
        $data['entry_payee_name_info'] = $this->language->get('entry_payee_name_info');
        $data['entry_memo'] = $this->language->get('entry_memo');
        $data['entry_memo_ip'] = $this->language->get('entry_memo_ip');
        $data['entry_memo_order_id'] = $this->language->get('entry_memo_order_id');
        $data['entry_minimum'] = $this->language->get('entry_minimum');
        $data['entry_maximum'] = $this->language->get('entry_maximum');
        $data['entry_minimum_info'] = $this->language->get('entry_minimum_info');
        $data['entry_maximum_info'] = $this->language->get('entry_maximum_info');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_sort_order'] = $this->language->get('entry_sort_order');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['error_payee_account'])) {
            $data['error_payee_account'] = $this->error['error_payee_account'];
        } else {
            $data['error_payee_account'] = '';
        }

        if (isset($this->error['error_passphrase'])) {
            $data['error_passphrase'] = $this->error['error_passphrase'];
        } else {
            $data['error_passphrase'] = '';
        }

        if (isset($this->error['error_account_name'])) {
            $data['error_account_name'] = $this->error['error_account_name'];
        } else {
            $data['error_account_name'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_payment'),
            'href' => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('payment/perfectmoney', 'token=' . $this->session->data['token'], 'SSL')
        );

        $data['action'] = $this->url->link('payment/perfectmoney', 'token=' . $this->session->data['token'], 'SSL');

        $data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

        if (isset($this->request->post['perfectmoney_payee_account'])) {
            $data['perfectmoney_payee_account'] = $this->request->post['perfectmoney_payee_account'];
        } else {
            $data['perfectmoney_payee_account'] = $this->config->get('perfectmoney_payee_account');
        }

        if (isset($this->request->post['perfectmoney_passphrase'])) {
            $data['perfectmoney_passphrase'] = $this->request->post['perfectmoney_passphrase'];
        } else {
            $data['perfectmoney_passphrase'] = base64_decode($this->config->get('perfectmoney_passphrase'));
        }

        if (isset($this->request->post['perfectmoney_payee_name'])) {
            $data['perfectmoney_payee_name'] = $this->request->post['perfectmoney_payee_name'];
        } else {
            $data['perfectmoney_payee_name'] = $this->config->get('perfectmoney_payee_name');
        }

        if (isset($this->request->post['perfectmoney_minimum_amount'])) {
            $data['perfectmoney_minimum_amount'] = $this->request->post['perfectmoney_minimum_amount'];
        } else {
            $data['perfectmoney_minimum_amount'] = $this->config->get('perfectmoney_minimum_amount');
        }

        if (isset($this->request->post['perfectmoney_maximum_amount'])) {
            $data['perfectmoney_maximum_amount'] = $this->request->post['perfectmoney_maximum_amount'];
        } else {
            $data['perfectmoney_maximum_amount'] = $this->config->get('perfectmoney_maximum_amount');
        }

        if (isset($this->request->post['perfectmoney_memo_ip'])) {
            $data['perfectmoney_memo_ip'] = $this->request->post['perfectmoney_memo_ip'];
        } else {
            $data['perfectmoney_memo_ip'] = $this->config->get('perfectmoney_memo_ip');
        }

        if (isset($this->request->post['perfectmoney_memo_order_id'])) {
            $data['perfectmoney_memo_order_id'] = $this->request->post['perfectmoney_memo_order_id'];
        } else {
            $data['perfectmoney_memo_order_id'] = $this->config->get('perfectmoney_memo_order_id');
        }

        if (isset($this->request->post['perfectmoney_sort_order'])) {
            $data['perfectmoney_sort_order'] = $this->request->post['perfectmoney_sort_order'];
        } else {
            $data['perfectmoney_sort_order'] = $this->config->get('perfectmoney_sort_order');
        }

        if (isset($this->request->post['perfectmoney_status'])) {
            $data['perfectmoney_status'] = $this->request->post['perfectmoney_status'];
        } else {
            $data['perfectmoney_status'] = $this->config->get('perfectmoney_status');
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('payment/perfectmoney.tpl', $data));
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'payment/perfectmoney')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->request->post['perfectmoney_payee_account']) {
            $this->error['error_payee_account'] = $this->language->get('error_payee_account');
        }
        if (!$this->request->post['perfectmoney_passphrase']) {
            $this->error['error_passphrase'] = $this->language->get('error_passphrase');
        }

        if (!$this->request->post['perfectmoney_payee_name']) {
            $this->error['error_account_name'] = $this->language->get('error_account_name');
        }
        return !$this->error;
    }
}
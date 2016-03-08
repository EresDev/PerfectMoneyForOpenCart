<form action="<?php echo $action; ?>" method="post">
    <input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $perfectmoney_payee_account; ?>">
    <input type="hidden" name="PAYEE_NAME" value="<?php echo $perfectmoney_payee_name; ?>">
    <input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $order_total; ?>">
    <input type="hidden" name="PAYMENT_UNITS" value="<?php echo $currency; ?>">
    <input type="hidden" name="PAYMENT_ID" value="<?php echo $order_id; ?>">
    <input type="hidden" name="STATUS_URL" value="<?php echo $status_url; ?>">
    <input type="hidden" name="PAYMENT_URL" value="<?php echo $success_url; ?>">
    <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="PAYMENT_URL" value="<?php echo $success_url; ?>">
    <input type="hidden" name="NOPAYMENT_URL" value="<?php echo $nopayment_url; ?>">
    <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="SUGGESTED_MEMO" value="<?php echo $perfectmoney_memo; ?>">
    <input type="hidden" name="SUGGESTED_MEMO_NOCHANGE" value="1">
    <div class="buttons">
        <div class="pull-right">
            <input type="submit" value="<?php echo $button_confirm; ?>" class="btn btn-primary" />
        </div>
    </div>
</form>

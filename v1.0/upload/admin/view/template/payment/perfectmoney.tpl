<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-perfectmoney" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($error_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-perfectmoney" class="form-horizontal">
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-merchant"><span data-toggle="tooltip" title="<?php echo $entry_payee_account_info; ?>"><?php echo $entry_payee_account; ?></span></label>
                        <div class="col-sm-10">
                            <input type="text" name="perfectmoney_payee_account" value="<?php echo $perfectmoney_payee_account; ?>" placeholder="<?php echo $entry_payee_account; ?>" id="input-payee-account" class="form-control" />
                            <?php if ($error_payee_account) { ?>
                            <div class="text-danger"><?php echo $error_payee_account; ?></div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-phasphrase"><span data-toggle="tooltip" title="<?php echo $entry_passphrase_info; ?>"><?php echo $entry_passphrase; ?></span></label>
                        <div class="col-sm-10">
                            <input type="text" name="perfectmoney_passphrase" value="<?php echo $perfectmoney_passphrase; ?>" placeholder="<?php echo $entry_passphrase; ?>" id="input-passphrase" class="form-control" />
                            <?php if ($error_passphrase) { ?>
                            <div class="text-danger"><?php echo $error_passphrase; ?></div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-payee-name"><span data-toggle="tooltip" title="<?php echo $entry_payee_name_info; ?>"><?php echo $entry_payee_name; ?></span></label>
                        <div class="col-sm-10">
                            <input type="text" name="perfectmoney_payee_name" value="<?php echo $perfectmoney_payee_name; ?>" placeholder="<?php echo $entry_payee_name; ?>" id="input-total" class="form-control" />
                            <?php if ($error_account_name) { ?>
                            <div class="text-danger"><?php echo $error_account_name; ?></div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip" title="<?php echo $entry_minimum_info; ?>"><?php echo $entry_minimum; ?></span></label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="perfectmoney_minimum_amount" value="<?php echo $perfectmoney_minimum_amount; ?>" placeholder="<?php echo $entry_minimum; ?>" id="input-total" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip" title="<?php echo $entry_maximum_info; ?>"><?php echo $entry_maximum; ?></span></label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" name="perfectmoney_maximum_amount" value="<?php echo $perfectmoney_maximum_amount; ?>" placeholder="<?php echo $entry_maximum; ?>" id="input-total" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-total"><?php echo $entry_memo; ?></label>
                        <div class="col-sm-10">

                            <input type="checkbox" name="perfectmoney_memo_ip" value="Yes" id="input-memo-ip" class="form-control" <?= $perfectmoney_memo_ip=="Yes"?"checked":"" ?> style="display:inline;"/>
                            <label for="input-memo-ip">
                                <?= $entry_memo_order_id; ?>
                            </label>
                        </div>
                        <div class="col-sm-10">

                                <input type="checkbox" name="perfectmoney_memo_order_id" value="Yes" id="input-memo-order-id" class="form-control" <?= $perfectmoney_memo_order_id=="Yes"?"checked":"" ?> style="display:inline;"/>
                            <label for="input-memo-order-id">
                            <?= $entry_memo_ip; ?>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
                        <div class="col-sm-10">
                            <select name="perfectmoney_status" id="input-status" class="form-control">
                                <?php if ($perfectmoney_status) { ?>
                                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                <option value="0"><?php echo $text_disabled; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_enabled; ?></option>
                                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="perfectmoney_sort_order" value="<?php echo $perfectmoney_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo $footer; ?>
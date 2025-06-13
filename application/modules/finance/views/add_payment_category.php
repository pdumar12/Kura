<!--sidebar end-->
<!--main content start-->
<div class="content-wrapper bg-gradient-light">
    <section class="content-header py-4 bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="display-4 font-weight-black mb-0">
                        <i class="fas fa-money-bill-wave text-primary mr-3"></i>
                        <?php
                        if (!empty($category->id))
                            echo lang('edit_invoice_items_lab_tests');
                        else
                            echo lang('create_invoice_items_lab_tests');
                        ?>
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="home"><?php echo lang('home'); ?></a></li>
                            <li class="breadcrumb-item active">
                                <?php
                                if (!empty($category->id))
                                    echo lang('edit_invoice_items_lab_tests');
                                else
                                    echo lang('create_invoice_items_lab_tests');
                                ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="content py-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-gradient-primary py-4">
                            <h2 class="card-title mb-0 text-white"><?php echo lang('items_created_here_will_be_appeared_at_the_time_of_creating_invoice'); ?></h2>
                        </div>
                        <div class="card-body p-5">
                            <?php echo validation_errors(); ?>
                            <form role="form" action="finance/addPaymentCategory" method="post" enctype="multipart/form-data">

                                <div class="form-group mb-4">
                                    <label class="text-uppercase text-sm"><?php echo lang('item_lab_test'); ?> <?php echo lang('name'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" name="category" value='<?php
                                                                                                                    if (!empty($setval)) {
                                                                                                                        echo set_value('category');
                                                                                                                    }
                                                                                                                    if (!empty($category->category)) {
                                                                                                                        echo $category->category;
                                                                                                                    }
                                                                                                                    ?>' required="">
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-uppercase text-sm"><?php echo lang('item'); ?> <?php echo lang('code'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" name="code" value='<?php
                                                                                                                if (!empty($setval)) {
                                                                                                                    echo set_value('code');
                                                                                                                }
                                                                                                                if (!empty($category->code)) {
                                                                                                                    echo $category->code;
                                                                                                                }
                                                                                                                ?>' required="">
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-uppercase text-sm"><?php echo lang('service_point'); ?> <span class="text-muted">(<?php echo lang('if_applicable'); ?>)</span></label>
                                    <input type="text" class="form-control form-control-lg" name="description" value='<?php
                                                                                                                        if (!empty($setval)) {
                                                                                                                            echo set_value('description');
                                                                                                                        }
                                                                                                                        if (!empty($category->description)) {
                                                                                                                            echo $category->description;
                                                                                                                        }
                                                                                                                        ?>'>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-uppercase text-sm"><?php echo lang('price'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" name="c_price" value='<?php
                                                                                                                    if (!empty($setval)) {
                                                                                                                        echo set_value('c_price');
                                                                                                                    }
                                                                                                                    if (!empty($category->c_price)) {
                                                                                                                        echo $category->c_price;
                                                                                                                    }
                                                                                                                    ?>' required="">
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-uppercase text-sm"><?php echo lang('doctors_commission'); ?> <?php echo lang('rate'); ?> (%) <span class="text-muted">(<?php echo lang('if_applicable'); ?>)</span></label>
                                    <input type="text" class="form-control form-control-lg" name="d_commission" value='<?php
                                                                                                                        if (!empty($setval)) {
                                                                                                                            echo set_value('d_commission');
                                                                                                                        }
                                                                                                                        if (!empty($category->d_commission)) {
                                                                                                                            echo $category->d_commission;
                                                                                                                        }
                                                                                                                        ?>'>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-uppercase text-sm"><?php echo lang('type'); ?> <span title="For lab tests that require reporting, choose 'Lab Test'. For all others, select 'Other'" data-toggle="tooltip"><i class="fa fa-question-circle"></i></span></label>
                                    <select class="form-control form-control-lg" name="type">
                                        <option value="diagnostic" <?php
                                                                    if (!empty($setval)) {
                                                                        if (set_value('type') == 'diagnostic') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    if (!empty($category->type)) {
                                                                        if ($category->type == 'diagnostic') {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>><?php echo lang('lab_test'); ?></option>
                                        <option value="others" <?php
                                                                if (!empty($setval)) {
                                                                    if (set_value('type') == 'others') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                if (!empty($category->type)) {
                                                                    if ($category->type == 'others') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>><?php echo lang('others'); ?></option>
                                    </select>
                                </div>

                                <input type="hidden" name="id" value='<?php
                                                                        if (!empty($category->id)) {
                                                                            echo $category->id;
                                                                        }
                                                                        ?>'>

                                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                                    <i class="fas fa-check-circle mr-3"></i><?php echo lang('submit'); ?>
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!--main content end-->
<!--footer start-->
<script src="common/js/codearistos.min.js"></script>
<script src="common/extranal/js/finance/payment_category.js"></script>
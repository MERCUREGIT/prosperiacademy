<?php if(isset($transaction)): ?>
    <div class="col-12">
        <div id="accordion-<?php echo e($transaction->id); ?>">
            <div data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?php echo e($transaction->id); ?>"
                aria-expanded="false" aria-controls="flush-collapse-<?php echo e($transaction->id); ?>">
                <div class="card-text">
                    <div class="d-sm-flex d-sm-block justify-content-between">
                        <div class="d-flex">
                            <i class="las la-dot-circle my-auto fs-3 me-4"></i>
                            <div class="">
                                <h4 class="text-capitalize text-white"><?php echo e($transaction->creator->full_name); ?></h4>
                                <span><?php echo e($transaction->created_at->format("H.iA - M-d-Y")); ?></span>
                                <br>
                                <span class="fs-6 pt-1 fw-bold"><?php echo e($transaction->string_status->value); ?></span>
                                <span class="badge badge-success"><?php echo e(__("Balance Update")); ?></span>
                            </div>
                        </div>

                        <div class="my-auto text-end pt-sm-0 pt-3 ps-sm-0 ps-5">
                            <span class="text-white fs-6 fw-lighter pb-2"><?php echo e(__("TRX")); ?> - <?php echo e($transaction->trx_id); ?></span>
                            <br>
                            <span class="text-white fs-5 pb-2"><?php echo e(get_amount($transaction->receive_amount,$transaction->request_currency,4)); ?></span>
                        </div>
                    </div>
                </div>

                </h2>
                <div id="flush-collapse-<?php echo e($transaction->id); ?>" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingOne" data-bs-parent="#accordion-<?php echo e($transaction->id); ?>">
                    <div class="accordion-body acc">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <h4><?php echo e(__("Transaction Type :")); ?></h4>
                                <h4><?php echo e(__("Add/Subtract Balance")); ?></h4>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <h4><?php echo e(__("Received Amount :")); ?></h4>
                                <h4><?php echo e(get_amount($transaction->receive_amount,$transaction->request_currency)); ?></h4>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/components/transaction/balance-update.blade.php ENDPATH**/ ?>
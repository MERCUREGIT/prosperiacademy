@isset($transaction)
    <div class="col-12">
        <div id="accordion-{{ $transaction->id }}">
            <div data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $transaction->id }}"
                aria-expanded="false" aria-controls="flush-collapse-{{ $transaction->id }}">
                <div class="card-text">
                    <div class="d-sm-flex d-sm-block justify-content-between">
                        <div class="d-flex">
                            <i class="las la-dot-circle my-auto fs-3 me-4"></i>
                            <div class="">
                                <h4 class="text-capitalize text-white">{{ $transaction->creator->full_name }}</h4>
                                <span>{{ $transaction->created_at->format("H.iA - M-d-Y") }}</span>
                                <br>
                                <span class="fs-6 pt-1 fw-bold">{{ $transaction->string_status->value }}</span>
                                <span class="badge badge-success">{{ __("Capital Return") }}</span>
                            </div>
                        </div>

                        <div class="my-auto text-end pt-sm-0 pt-3 ps-sm-0 ps-5">
                            <span class="text-white fs-6 fw-lighter pb-2">{{ __("TRX") }} - {{ $transaction->trx_id }}</span>
                            <br>
                            <span class="text-white fs-5 pb-2">{{ get_amount($transaction->receive_amount,$transaction->request_currency,4)  }}</span>
                        </div>
                    </div>
                </div>

                </h2>
                <div id="flush-collapse-{{ $transaction->id }}" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingOne" data-bs-parent="#accordion-{{ $transaction->id }}">
                    <div class="accordion-body acc">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <h4>{{ __("Transaction Type :") }}</h4>
                                <h4>{{ ucwords(strtolower(remove_speacial_char($transaction->type," "))) }}</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <h4>{{ __("Return Amount :") }}</h4>
                                <h4>{{ get_amount($transaction->receive_amount,$transaction->request_currency) }}</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <h4>{{ __("Received Amount :") }}</h4>
                                <h4>{{ get_amount($transaction->receive_amount,$transaction->request_currency) }}</h4>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endisset
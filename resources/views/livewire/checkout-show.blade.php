<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Thanh Toán</h4>
            <hr>
            @if ($this->totalProductAmount != '0')
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Tổng tiền:
                                <span class="float-end">{{ number_format($this->totalProductAmount) }} VNĐ</span>
                            </h4>
                            <hr>
                            <small>* Items will be delivered in 3 - 5 days.</small>
                            <br />
                            <small>* Tax and other charges are included ?</small>
                        </div>
                    </div>
                    <form action="{{ url('/user/online_checkout') }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <div class="shadow bg-white p-3">
                                <h4 class="text-primary">
                                    Basic Information
                                </h4>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Full Name</label>
                                        <input type="text" wire:model.defer="fullname" id="fullname" name="fullname"
                                            class="form-control" placeholder="Enter Full Name" />
                                        @error('fullname')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Phone Number</label>
                                        <input type="number" wire:model.defer="phone" id="phone" name="phone"
                                            class="form-control" placeholder="Enter Phone Number" />
                                        @error('phone')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Email Address</label>
                                        <input type="email" wire:model.defer="email" id="email" name="email"
                                            class="form-control" placeholder="Enter Email Address" />
                                        @error('email')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Pin-code (Zip-code)</label>
                                        <input type="number" wire:model.defer="pincode" id="pincode" name="pincode"
                                            class="form-control" placeholder="Enter Pin-code" />
                                        @error('pincode')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Full Address</label>
                                        <textarea wire:model.defer="address" class="form-control" id="address" name="address" rows="2"></textarea>
                                        @error('address')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Select Payment Mode: </label>
                                        <div class="d-md-flex align-items-start">
                                            <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
                                                <button wire:loading.attr="disabled" class="nav-link active fw-bold"
                                                    id="cashOnDeliveryTab-tab" data-bs-toggle="pill"
                                                    data-bs-target="#cashOnDeliveryTab" type="button" role="tab"
                                                    aria-controls="cashOnDeliveryTab" aria-selected="true">
                                                    Thanh toán trực tiếp
                                                </button>
                                                {{-- PayPal --}}
                                                {{-- <button wire:loading.attr="disabled" class="nav-link fw-bold"
                                                    id="onlinePayment-tab" data-bs-toggle="pill"
                                                    data-bs-target="#onlinePayment" type="button" role="tab"
                                                    aria-controls="onlinePayment" aria-selected="false">
                                                    Thanh toán Online
                                                </button> --}}
                                                {{-- VNPAY --}}
                                                <button wire:loading.attr="disabled" class="nav-link fw-bold"
                                                    id="onlineVNPAY-tab" data-bs-toggle="pill"
                                                    data-bs-target="#onlineVNPAY" type="button" role="tab"
                                                    aria-controls="onlineVNPAY" aria-selected="false">
                                                    Thanh toán VNPAY
                                                </button>
                                                {{-- Momo --}}
                                                {{-- <button wire:loading.attr="disabled" class="nav-link fw-bold"
                                                    id="onlineMoMo-tab" data-bs-toggle="pill"
                                                    data-bs-target="#onlineMoMo" type="button" role="tab"
                                                    aria-controls="onlineMoMo" aria-selected="false">
                                                    Thanh toán MoMo
                                                </button> --}}
                                            </div>
                                            <div class="tab-content col-md-9" id="v-pills-tabContent">
                                                <div class="tab-pane fade active show" id="cashOnDeliveryTab"
                                                    role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab"
                                                    tabindex="0">
                                                    <h6>Phương thức thanh toán khi nhận hàng</h6>
                                                    <hr />
                                                    <button wire:loading.attr="disabled" wire:click="codOrder"
                                                        type="button" class="btn btn-warning">
                                                        <span wire:loading.remove wire:target="codOrder">
                                                            Thanh toán khi nhận hàng
                                                        </span>
                                                        <span wire:loading wire:target="codOrder">
                                                            Đang đặt hàng.....
                                                        </span>
                                                    </button>

                                                </div>
                                                {{-- PayPal --}}
                                                {{-- <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                                    aria-labelledby="onlinePayment-tab" tabindex="0">
                                                    <h6>Phương thức thanh toán Online</h6>
                                                    <hr />
                                                    <button type="button" wire:loading.attr="disabled"
                                                    class="btn btn-warning">Thanh toán PayPal</button>
                                                    <div wire:ignore>
                                                        <div wire:loading.attr="disabled"
                                                            id="paypal-button-container"></div>
                                                    </div>
                                                </div> --}}

                                                {{-- VNPay --}}
                                                <div class="tab-pane fade" id="onlineVNPAY" role="tabpanel"
                                                    aria-labelledby="onlineVNPAY-tab" tabindex="0">
                                                    <h6>Phương thức thanh toán VNPAY</h6>
                                                    <hr />
                                                    {{-- <form action="{{ url('/user/vnpay_payment') }}" method="POST"> --}}

                                                    {{-- @csrf --}}
                                                    <input type="hidden" name="total_vnpay" class="float-end"
                                                        value="{{ $this->totalProductAmount }} ">

                                                    <button type="submit" name="redirect"
                                                        wire:loading.attr="disabled" class="btn btn-warning">
                                                        Thanh toán VNPAY
                                                    </button>
                                                    {{-- </form> --}}
                                                </div>
                                                {{-- MoMo --}}
                                                {{-- <div class="tab-pane fade" id="onlineMoMo" role="tabpanel"
                                                    aria-labelledby="onlineMoMo-tab" tabindex="0">
                                                    <h6>Phương thức thanh toán MoMo</h6>
                                                    <hr />

                                                    <input type="hidden" name="total_momo" class="float-end"
                                                        value="{{ $this->totalProductAmount }} ">

                                                    <button type="submit" name="payUrl" class="btn btn-warning">
                                                        Thanh toán MoMo
                                                    </button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            @else
                <div class="card card-body shadow text-center p-md-5">
                    <h4>
                        No items in cart to checkout
                    </h4>
                    <a href="{{ url('user/homeAuth') }}" class="btn btn-warning">Cửa hàng</a>
                </div>
            @endif
        </div>
    </div>
</div>

{{-- thanh toan PayPal --}}
{{-- @push('scripts')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AR0Vprs090rRP-nqTFggO5RgDGAQVRU2PT7qPy3lzRxvE-DYQJmhFJesKEPpbyBp0EpxQRCQeUARyMgS&currency=USD">
    </script>

    <script>
        window.paypal
            .Buttons({
                onClick: function() {

                    // Show a validation error if the checkbox is not checked
                    if (!document.getElementById('fullname').value ||
                        !document.getElementById('phone').value ||
                        !document.getElementById('email').value ||
                        !document.getElementById('pincode').value ||
                        !document.getElementById('address').value

                    ) {
                        Livewire.emit('validationForAll');
                        return false;
                    } else {
                        @this.set('fullname', document.getElementById('fullname').value);
                        @this.set('phone', document.getElementById('phone').value);
                        @this.set('email', document.getElementById('email').value);
                        @this.set('pincode', document.getElementById('pincode').value);
                        @this.set('address', document.getElementById('address').value);

                    }
                },

                async createOrder() {
                    try {
                        const response = await fetch("/api/orders", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            use the "body"
                            param to optionally pass additional order information
                            like product ids and quantities
                            body: JSON.stringify({
                                cart: [{
                                    id: "YOUR_PRODUCT_ID",
                                    quantity: "YOUR_PRODUCT_QUANTITY",
                                }, ],

                            }),
                        });

                        const orderData = await response.json();

                        if (orderData.id) {
                            return orderData.id;
                        } else {
                            const errorDetail = orderData?.details?.[0];
                            const errorMessage = errorDetail ?
                                `${errorDetail.issue} ${errorDetail.description} (${orderData.debug_id})` :
                                JSON.stringify(orderData);

                            throw new Error(errorMessage);
                        }
                    } catch (error) {
                        console.error(error);
                        resultMessage(`Could not initiate PayPal Checkout...<br><br>${error}`);
                    }

                },
                async onApprove(data, actions) {
                    try {
                        const response = await fetch(`/api/orders/${data.orderID}/capture`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                        });

                        const orderData = await response.json();

                        // Three cases to handle:
                        //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                        //   (2) Other non-recoverable errors -> Show a failure message
                        //   (3) Successful transaction -> Show confirmation or thank you message

                        const errorDetail = orderData?.details?.[0];

                        if (errorDetail?.issue === "INSTRUMENT_DECLINED") {
                            // (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                            // recoverable state, per https://developer.paypal.com/docs/checkout/standard/customize/handle-funding-failures/
                            return actions.restart();
                        } else if (errorDetail) {
                            // (2) Other non-recoverable errors -> Show a failure message
                            throw new Error(`${errorDetail.description} (${orderData.debug_id})`);
                        } else if (!orderData.purchase_units) {
                            throw new Error(JSON.stringify(orderData));
                        } else {
                            // (3) Successful transaction -> Show confirmation or thank you message
                            // Or go to another URL:  actions.redirect('thank_you.html');
                            const transaction =
                                orderData?.purchase_units?.[0]?.payments?.captures?.[0] ||
                                orderData?.purchase_units?.[0]?.payments?.authorizations?.[0];
                            resultMessage(
                                `Transaction ${transaction.status}: ${transaction.id}<br><br>See console for all available details`,
                            );
                            console.log(
                                "Capture result",
                                orderData,
                                JSON.stringify(orderData, null, 2),
                            );
                        }
                    } catch (error) {
                        console.error(error);
                        resultMessage(
                            `Sorry, your transaction could not be processed...<br><br>${error}`,
                        );
                    }
                },
            })
            .render("#paypal-button-container");
    </script>
@endpush --}}

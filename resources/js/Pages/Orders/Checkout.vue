<template>
    <frontend>
        <div class="mt-4">
            <div class="container">
                <div class="text-center pt-4">
                    <h2>Checkout</h2>
                </div>
                <div class="my-4 rounded flex justify-between items-center bg-gray-800">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 80%">Product</th>
                                <th style="width: 10%">Qty</th>
                                <th style="width: 10%">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in order.items" :key="index">
                                <td>{{item.name}}</td>
                                <td>{{item.amount}}</td>
                                <td>£{{item.price / 100}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">Total</td>
                                <td>£{{order.total / 100}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="text-center pt-4">
                    <h3>Select a Payment Gateway</h3>
                    <div class="mt-4 flex justify-center">
                        <button class="btn btn-primary btn-lg mr-2" style="padding-top: 5px; padding-bottom: 5px; height: 35px; font-size: 14px;" :disabled="loading" @click="checkoutWithStripe"><i class="fab fa-stripe"></i> Credit Card</button>
                        <div id="paypal-button-container"></div>
                        <!-- <button class="btn btn-primary btn-lg ml-2" style="padding-top: 5px; padding-bottom: 5px; height: 35px; font-size: 14px;"  :disabled="loading"><i class="fab fa-bitcoin"></i> Pay With Bitcoin</button> -->
                    </div>
                </div>
            </div>
        </div>
    </frontend>
</template>

<script>
    import Frontend from '@/Layouts/Frontend'
    import Slider from '@/Components/Slider'

    export default {
        props: ['order'],
        components: {
            Frontend,
            Slider
        },
        data () {
            return {
                loading: false
            }
        },
        mounted () {
            var self = this
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                         purchase_units: [{
                            amount: {
                                reference_id: self.order.uid,
                                custom_id: self.order.uid,
                                invoice_id: self.order.uid,
                                value: self.order.total / 100,
                                currency_code: "BRL",
                                description: self.order.items[0].name
                            }
                        }]
                    })
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        location.href = route('orders.success', self.order.uid)
                    });
                }
            }).render('#paypal-button-container');
        },
        methods: {
            checkoutWithStripe() {
                var stripe = Stripe('pk_test_51I8VLgJ5eYLNHsuuuVREgOel6aQIarm8t6bsd1vu0SeM8aFqKPIaraoQpKwHkhpv2JlPRTdu03CXs6qMbHCUMdBY00HG3J5LfT');
                axios.post(route('stripe.session'), {
                    uid: this.order.uid
                }).then(res => {
                    stripe.redirectToCheckout({sessionId: res.data.id})
                }).catch(err => {
                    console.error(err)
                })
            }
        }
    }
</script>

<style lang="css">
    .page-header {
        background-image: url('/images/pageheader.jpg');
        background-size: cover;
    }
    th {
        border-top: none !important;
    }
</style>
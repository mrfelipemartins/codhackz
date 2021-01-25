<template>
    <frontend>
        <div class="page-header">
            <div class="container">
                <div class="text-center py-4">
                    <h1>Premium Accounts</h1>
                    <p class="text-yellow-500 font-bold">The cheapest Call Of Duty Warzone accounts</p>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="container">
                <div class="mt-4 rounded flex justify-between items-center">
                    <div class="mr-6">
                        <p>We're dedicated to provide our customers with fresh warzone ready accounts, phone number verified. The cheapest Call Of Duty Warzone accounts.</p>
                        <p>
                            After payment is confirmed your account will be delivered automatically to your e-mail account.
                        </p>
                        <button class="btn btn-primary btn-lg" @click="placeOrder" :disabled="loading" v-if="stock > 0">
                            <b-spinner small v-if="loading"></b-spinner> Buy Now for £3.99
                        </button>
                        <button class="btn btn-primary btn-lg" disabled v-else>
                            Out of Stock
                        </button>
                    </div>
                    <img src="/images/render1.png" alt="">
                </div>
            </div>
        </div>
    </frontend>
</template>

<script>
    import Frontend from '@/Layouts/Frontend'
    import Slider from '@/Components/Slider'

    export default {
        props: ['stock'],
        components: {
            Frontend,
            Slider
        },
        data () {
            return {
                loading: false
            }
        },
        methods: {
            placeOrder() {
                this.loading = true
                this.$inertia.post(route('orders.store'), {
                    product: 'premium-account'
                });
            }
        }
    }
</script>

<style lang="css">
    .page-header {
        background-image: url('/images/pageheader.jpg');
        background-size: cover;
    }
</style>
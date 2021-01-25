<template>
    <frontend>
        <div class="page-header">
            <div class="container">
                <div class="text-center py-4">
                    <h1>Bot Lobby</h1>
                    <p class="text-yellow-500 font-bold">Create lobby's at the starting price of £15</p>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="container">
                <div class="mt-4 rounded flex justify-between items-center page-content-sm">
                    <div class="mr-6">
                        <p>Cheat your way into Call of Duty bot lobbys and boost your accounts statistics and improve your overall skill. Create lobby's at the starting price of £15!</p>
                        <p>
                            After payment is confirmed you will be able to speak with us to arrange the service execution.
                        </p>
                        <p>Please select an option below to continue your purchase.</p>
                        <div class="pr-2">
                            <select v-model="lobby" id="" class="form-control" @change="updatePrice">
                                <option :value="null">Select an option...</option>
                                <option value="2-hours-normal-speed">2 hours normal speed - £15.00</option>
                                <option value="1-hour-25x-speed">1 hour 25x speed - £25.00</option>
                                <option value="max-level-max-guns">Max Level and Max Guns - £21.99</option>
                                <option value="dark-aether-unlock-all-camos">Dark Aether Unlock All Camos Instantly - £50.00</option>
                            </select>
                        </div>
                        <button class="btn btn-primary btn-lg mt-4" :disabled="loading" @click="placeOrder" v-if="price">
                             <b-spinner small v-if="loading"></b-spinner> Buy Now for £{{price}}
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
        components: {
            Frontend,
            Slider
        },
        data () {
            return {
                lobby: null,
                price: null,
                loading: false
            }
        },
        watch: {
            wins (oldVal, newVal) {
                // this.updatePrice()
            }
        },
        methods: {
            placeOrder() {
                this.loading = true
                this.$inertia.post(route('orders.store'), {
                    product: 'lobby',
                    price: this.price,
                    lobby: this.lobby
                });
            },
            updatePrice() {
                if(this.lobby === '2-hours-normal-speed') {
                    this.price = 15.00
                } else if(this.lobby === '1-hour-25x-speed') {
                    this.price = 25.00
                } else if(this.lobby === 'max-level-max-guns') {
                    this.price = 21.99
                } else if(this.lobby === 'dark-aether-unlock-all-camos') {
                    this.price = 50.00
                } else {
                    this.price = null
                }
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
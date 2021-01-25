<template>
    <frontend>
        <div class="page-header">
            <div class="container">
                <div class="text-center py-4">
                    <h1>Warzone Wins</h1>
                    <p class="text-yellow-500 font-bold">Boost your statistics!</p>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="container">
                <div class="mt-4 rounded flex justify-between items-center">
                    <div class="mr-6">
                        <p>We have professional Call of duty players ready to level accounts up and collect plenty of wins and boost your statistics.</p>
                        <p>
                            After payment is confirmed you will be able to speak with us to arrange the service execution.
                        </p>
                        <p>Slide below to select the amount of wins you wish to buy.</p>
                        <div class="pr-2">
                            <b-form-input @change="updatePrice" min="1" max="20" type="range" v-model="wins"></b-form-input>
                            <div class="flex items-center justify-between">
                                <div>1 Win</div>
                                <div>10 Wins</div>
                                <div>20 Wins</div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg mt-4" :disabled="loading" @click="placeOrder">
                             <b-spinner small v-if="loading"></b-spinner> Buy {{wins}} Wins for £{{price}}
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
                wins: 1,
                price: 3.99,
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
                    product: 'wins',
                    amount: this.wins,
                    price: this.price
                });
            },
            updatePrice() {
                let wins = parseInt(this.wins)
                if(wins < 5) {
                    this.price = (wins * 3.99).toFixed(2)
                } else if(wins === 5) {
                    this.price = 16.99
                } else if(wins > 5 && wins < 10) {
                    this.price = (16.99 + 3.99 * (wins - 5)).toFixed(2)
                } else if(wins === 10) {
                    this.price = 30.00
                } else if(wins > 10 && wins < 20) {
                    this.price = (30.00 + 3.99 * (wins - 10)).toFixed(2)
                } else if(wins == 20) {
                    this.price = 54.99
                } else if(wins > 20) {
                    this.price = (54.99 + 3.99 * (wins - 20)).toFixed(2)
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
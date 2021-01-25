<template>
    <dashboard>
        <template #content>
            <div class="bg-gray-800 rounded">
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
            <div class="bg-gray-800 rounded mt-4" v-if="order.status === 'OPEN'">
                <div class="p-4 text-center">
                    <h1 style="font-size: 18px; color: gold;"><i class="fas fa-clock"></i> Payment is still pending</h1>
                    <inertia-link :href="route('orders.checkout', order.uid)" class="btn btn-primary">Pay Now</inertia-link>
                </div>
            </div>
            <div class="bg-gray-800 rounded mt-4" v-if="order.status === 'PAID'">
                <div class="p-4 text-center" v-if="order.type === 'premium-account'">
                    <h1 style="font-size: 18px; color: #00bc8c;"><i class="fas fa-check-circle"></i> Payment is confirmed</h1>
                    <p class="mb-0">The order will be delivered to your email shortly.</p>
                </div>
                <div v-else>
                    <div class="p-4 text-center">
                        <h1 style="font-size: 18px; color: #00bc8c;"><i class="fas fa-check-circle"></i> Payment is confirmed</h1>
                        <p class="mb-0">Please use the chat below to continue the deliver of your purchase</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded mt-4 p-4" v-if="is_admin(user)">
                <button class="btn btn-primary">Mark as Delivered</button>
                <button class="btn btn-primary">Cancel Order</button>
            </div>
            
            <div v-if="order.type === 'wins' || order.type === 'lobby'">
                <div v-if="order.status === 'PAID' || order.status === 'DELIVERED'">
                    <chat-instance :order="order"></chat-instance>
                </div>
            </div>
        </template>
    </dashboard>
</template>

<script>
    import Dashboard from '@/Layouts/Dashboard'
    import Welcome from '@/Jetstream/Welcome'
    import ChatInstance from '@/Components/Chat/ChatInstance.vue'

    export default {
        props: ['user', 'order'],
        data () {
            return {
                user: this.$inertia.page.props.user
            }
        },
        components: {
            Dashboard,
            ChatInstance
        }
    }
</script>
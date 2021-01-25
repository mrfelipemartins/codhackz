<template>
    <dashboard>
        <template #content>
            <div class="bg-gray-800 rounded">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Type</th>
                            <th v-if="!is_admin(user)">Created</th>
                            <th v-else>Customer</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(order, index) in orders" :key="index">
                            <td style="text-transform: uppercase;">{{order.uid.split('-')[0]}}</td>
                            <td>{{getType(order.type)}}</td>
                            <td v-if="!is_admin(user)">{{order.lapse}}</td>
                            <td v-else>{{order.user.name}}</td>
                            <td v-html="getStatus(order.status)"></td>
                            <td><inertia-link :href="route('orders.show', order.uid)" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></inertia-link></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </template>
    </dashboard>
</template>

<script>
    import Dashboard from '@/Layouts/Dashboard'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        props: ['orders'],
        data () {
            return {
                user: this.$inertia.page.props.user
            }
        },
        components: {
            Dashboard
        },
        methods: {
            getStatus(status) {
                if(status === 'OPEN') {
                    return '<div class="badge badge-secondary">Waiting Payment</div>'
                } else if(status === 'PAID') {
                    return '<div class="badge badge-primary">Payment Confirmed</div>'
                } else if(status === 'CANCELED') {
                    return '<div class="badge badge-danger">Canceled</div>'
                } else if(status === 'DELIVERED') {
                    return '<div class="badge badge-success">Delivered</div>'
                }
            },
            getType(type) {
                if(type === 'premium-account') {
                    return 'Premium Account'
                } else if(type === 'wins') {
                    return 'Warzone Wins'
                } else if(type === 'lobby') {
                    return 'Bot Lobby'
                }
            }
        }
    }
</script>
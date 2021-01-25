<template>
    <dashboard>
        <template #content>
            <div class="mb-2 text-right">
                <inertia-link :href="route('accounts.create')" class="btn btn-success"><i class="fa fa-plus"></i> Add Account</inertia-link>
            </div>
            <div class="bg-gray-800 rounded">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Login</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody v-if="accounts.length > 0">
                        <tr v-for="(account, index) in accounts" :key="index" >
                            <td style="text-transform: uppercase;">{{account.id}}</td>
                            <td>{{account.login}}</td>
                            <td v-if="account.order_id">Sold</td>
                            <td v-else>Free</td>
                            <td>
                                <inertia-link :href="route('accounts.edit', account.id)" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></inertia-link>
                                <button class="btn btn-danger btn-sm" @click="deleteAccount(account.id)"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr>
                            <td colspan="6" class="p-4 text-center">No accounts so far</td>
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
        props: ['accounts'],
        data () {
            return {
                user: this.$inertia.page.props.user
            }
        },
        components: {
            Dashboard
        },
        methods: {
            deleteAccount(id) {
                this.$swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if(result.isConfirmed) {
                        this.$inertia.delete(route('accounts.destroy', id))
                    }
                })
            }
        }
    }
</script>
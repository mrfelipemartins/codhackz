<template>
    <frontend>
        <div class="bg-gray-800 cp-header">
            <div class="container">
                <div class="flex items-center justify-between" style="height: 120px;">
                    <div class="flex items-center">
                        <img :src="user.profile_photo_url" class="rounded-full" alt="">
                        <div class="ml-4">
                            <h4 class="m-0">{{user.name}}</h4>
                            <p class="m-0">{{user.email}}</p>
                        </div>
                    </div>
                    <div class="edit-profile">
                        <inertia-link :href="route('dashboard')" class="btn btn-primary">Edit Profile</inertia-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-3" v-if="!is_admin(user)">
                        <div class="bg-gray-800 rounded p-4 mb-4">
                            <inertia-link :href="route('dashboard')" :active="route().current('dashboard')" class="block mb-2"><i class="far fa-user"></i> My Account</inertia-link>
                            <inertia-link :href="route('orders.index')" :active="route().current('orders.*')" class="block"><i class="fas fa-shopping-cart"></i> Order History</inertia-link>
                        </div>
                    </div>
                    <div class="col-md-3" v-else>
                        <div class="bg-gray-800 rounded p-2 mb-4">
                            <div class="pb-2 border-b text-center">Admin Panel</div>
                            <div class="p-2">
                                <inertia-link :href="route('orders.index')" :active="route().current('orders.*')" class="block"><i class="fas fa-shopping-cart"></i> All Orders</inertia-link>
                                <inertia-link :href="route('accounts.index')" :active="route().current('accounts.*')" class="block mt-1"><i class="fas fa-users"></i> Accounts</inertia-link>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <slot name="content"></slot>
                    </div>
                </div>
            </div>
        </div>
    </frontend>
</template>

<script>
    import Frontend from '@/Layouts/Frontend'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        data () {
            return {
                user: this.$inertia.page.props.user
            }
        },
        components: {
            Frontend,
            Welcome,
        },
        mounted () {
            OneSignal.setEmail(this.user.email);
        }
    }
</script>

<style lang="css">
    .cp-header {
        height: 120px;
    }
    [active="true"] {
        color: gold;
    }
    th {
        border-top: none !important;
    }
</style>
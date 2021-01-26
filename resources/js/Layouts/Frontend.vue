<template>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="container">
                <inertia-link class="navbar-brand" :href="route('index')">
                    <img src="/images/logo.png" alt="" style="height: 48px;">
                </inertia-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <inertia-link class="nav-link" :href="route('index')">Home 
                                <span class="sr-only">(current)</span>
                            </inertia-link>
                        </li>
                        <li class="nav-item dropdown ml-2">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">Services</a>
                            <div class="dropdown-menu">
                                <inertia-link :href="route('orders.place', 'premium-accounts')" class="dropdown-item">Premium Accounts</inertia-link>
                                <inertia-link :href="route('orders.place', 'wins')" class="dropdown-item">Warzone Wins</inertia-link>
                                <inertia-link :href="route('orders.place', 'lobby')" class="dropdown-item">Bot Lobby</inertia-link>
                            </div>
                        </li>
                        <li class="nav-item ml-2">
                            <inertia-link class="nav-link" :href="route('reviews.index')">Reviews</inertia-link>
                        </li>
                        <li class="nav-item ml-2">
                            <inertia-link class="nav-link" :href="route('contact')">Contact Us</inertia-link>
                        </li>
                        <li class="nav-item ml-4 mt-1" v-if="!user">
                            <inertia-link :href="route('login')" class="btn btn-outline-light">Login</inertia-link>
                        </li>
                        <li class="nav-item ml-2 mt-1" v-if="!user">
                            <inertia-link :href="route('register')" class="btn btn-outline-light">Register</inertia-link>
                        </li>
                        <notifications v-if="user" />
                        <li class="nav-item dropdown ml-4" v-if="user">
                            <a class="nav-link dropdown-toggle flex" style="display: flex;" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img :src="user.profile_photo_url" width="25" height="25" class="rounded-circle">
                                <span class="ml-2">{{user.name}}</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <inertia-link class="dropdown-item" :href="route('dashboard')">My Account</inertia-link>
                            <a class="dropdown-item" href="#" @click="logout">Log Out</a>
                            </div>
                        </li>   
                    </ul>
                
                </div>
            </div>
        </nav>

        <div class="page-content">
            <slot></slot>
        </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="ftr text-center">
                            <h3>Links</h3>
                            <ul class="content">
                                <li><a :href="route('index')">Home</a></li>
                                <li><a :href="route('orders.place', 'premium-accounts')">Premium Accounts</a></li>
                                <li><a :href="route('orders.place', 'wins')">Warzone Wins</a></li>
                                <li><a :href="route('orders.place', 'lobby')">Bot Lobby</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ftr text-center">
                            <h3>Contact</h3>
                            <ul class="content">
                                <li><a href="mailto:support@codhackingservices.com">support@codhackingservices.com</a></li>
                                <li><a href="#">+44 7568969310</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ftr text-center">
                            <h3>Social</h3>
                            <ul class="content">
                                <li><a href="#">Discord</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Instagram</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="ftr">
                            <h3>Join Our Newsletter</h3>
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your E-mail" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon1">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">© All Rights Reserved - CodHackz</div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
    import Notifications from '@/Components/Notifications'
    export default {
        data () {
            return {
                user: this.$inertia.page.props.user
            }
        },
        components: {
            Notifications
        },
        methods: {

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>

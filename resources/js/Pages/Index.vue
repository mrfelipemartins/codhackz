<template>
    <frontend>
        <slider />

        <div class="service-section">
            <div class="inside">
                <div class="text-center pb-4">
                    <h1>Our Services</h1>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="inner-content">
                            <div class="title">
                                <div class="text-center block">
                                    <img alt="COD" class="text-center" src="/images/icon/google.svg" style="margin:0 auto">
                                </div>
                                <h1 class="mt-2">Premium Accounts</h1>
                                <br>
                                <br>
                                <p>We're dedicated to provide our customers with premium high leveled accounts with 100's of battle royal wins. Visit the 
                                    <a href="shop.html" style="color: #f2f5f7;">page</a> to purchase these premium accounts. The cheapest Call Of Duty Warzone accounts
                                </p>
                                <inertia-link :href="route('orders.place', 'premium-accounts')" class="btn btn-primary" style="margin-top: -15px;">Order Now</inertia-link>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="inner-content">
                            <div class="title">
                                    <div class="text-center">
                                        <img alt="COD" src="/images/icon/trophy.svg" style="margin:0 auto">
                                    </div>
                                    <h1 class="mt-2">Warzone Wins</h1>
                                    <br>
                                    <br>
                                    <p>We have professional Call of duty players ready to level accounts up and collect plenty of wins and boost your statistics. More infomation about our professional players at our 
                                        <a href="about.html" style="color: #f2f5f7;">about</a> page.
                                    </p>
                                    <inertia-link :href="route('orders.place', 'wins')" class="btn btn-primary" style="margin-top: -15px;">Order Now</inertia-link>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="inner-content">
                            <div class="title">
                                <div class="text-center"><img alt="24/7 Support COD" src="/images/icon/bot.svg" style="margin:0 auto"></div>
                                <h1 class="mt-2">Bot Lobby</h1>
                                <br>
                                <br>
                                <p>Cheat your way into Call of Duty bot lobbys and boost your accounts statistics and improve your overall skill. Create lobby's at the starting price of $3.95! Here's how we do it 
                                    <a href="about.html" style="color: #f2f5f7;">about</a>.
                                </p>
                                <inertia-link :href="route('orders.place', 'lobby')" class="btn btn-primary" style="margin-top: -15px;">Order Now</inertia-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="testimonials">
            <div class="inner-testimonial">
                <div class="row">
                    <div class="col-md-4">
                        <div class="testimonial">
                            <div class="name">Example name</div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p>

                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,

                </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial">
                            <div class="name">Example name</div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <p>

                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,

                </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial">
                            <div class="name">Example name</div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <p>

                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,

                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="container">
                <div class="text-center pt-4">
                    <h1>What makes us Great</h1>
                    <p class="text-yellow-500 font-bold">REASONS TO CHOOSE US</p>
                </div>
                <div class="mb-2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-row">
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-row">
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-row">
                                
                            </div>
                        </div>
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
        components: {
            Frontend,
            Slider
        },
    }
</script>

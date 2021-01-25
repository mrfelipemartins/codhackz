<template>
    <frontend>
        <div class="mt-4">
            <div class="container">
                <div class="text-center pt-4">
                    <h2>Success!</h2>
                </div>
                <div class="my-4 rounded flex justify-between items-center bg-gray-800">
                   
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
        methods: {
            
        }
    }
</script>

<style lang="css">
    .page-header {
        background-image: url('/images/pageheader.jpg');
        background-size: cover;
    }
</style>
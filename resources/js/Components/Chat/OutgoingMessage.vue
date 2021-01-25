<template>
    <div class="message right mb-4">
        <div class="message-metadata clearfix">
            <span class="float-right">
                <vue-moments-ago prefix="" suffix="ago" :date="message.lapse"></vue-moments-ago>
            </span>
        </div>
        <img :src="user.profile_photo_url" class="rounded-full message-avatar"  alt="">
        <div class="message-text">
            {{message.body}}
        </div>
    </div>
</template>

<script>
import VueMomentsAgo from 'vue-moments-ago'

export default {
    components: {
        VueMomentsAgo
    },
    props: ['user','message']
}
</script>
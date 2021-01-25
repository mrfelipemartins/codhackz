<template>
    <div class="bg-gray-800 rounded mt-4">
        <div class="chat-header py-2 px-4 flex items-center justify-between border-b border-gray" v-if="user.id === order.user.id">
            <div class="flex items-center">
                <img src="https://ui-avatars.com/api/?name=CodHackz&color=7F9CF5&background=EBF4FF" class="rounded-full" style="height: 30px; width: 30px;" alt="">
                <div class="ml-2 font-bold text-xl">
                    CodHackz Team
                </div>
            </div>
            <div>
                <b-spinner small v-if="loading" /> {{status}}
            </div>
        </div>
        <div v-else class="chat-header py-2 px-4 flex items-center border-b border-gray">
            <img :src="order.user.profile_photo_url" class="rounded-full" style="height: 30px; width: 30px;" alt="">
            <div class="ml-2 font-bold text-xl">
                {{order.user.name}}
            </div>
        </div>
        <div class="chat-messages p-2" v-chat-scroll="scrollOptions">
            <div v-for="(message, index) in messages" :key="index">
                <outgoing-message :user="user" :message="message" v-if="message.user_id == user.id" />
                <incoming-message :user="order.user" :message="message" v-else />
            </div>
        </div>
        <div class="chat-write p-2">
            <textarea v-model="message" v-on:keyup.enter="sendMessage" :disabled="order.status === 'DELIVERED'" placeholder="Type your message" rows="2" class="form-control pt-2"></textarea>
        </div>
    </div>
</template>

<script>
import IncomingMessage from '@/Components/Chat/IncomingMessage'
import OutgoingMessage from '@/Components/Chat/OutgoingMessage'
export default {
    props: ['order'],
    components: {
        IncomingMessage,
        OutgoingMessage
    },
    data () {
        return {
            user: this.$inertia.page.props.user,
            message: '',
            status: '',
            messages: [],
            loading: false,
            scrollOptions: {
                enabled: false,
                smooth: true,
                notSmoothOnInit: true
            }
        }
    },
    mounted () {
        this.fetchMessages()
    },
    methods: {
        fetchMessages () {
            this.loading = true
            this.status = 'Fetching messages'
            axios.get(route('messages.index', this.order.id)).then(res => {
                this.loading = false
                this.status = ''
                this.messages = res.data
                let options = this.scrollOptions
                options.enabled = true
                this.scrollOptions = options
                this.connectToChat()
            })
        },
        connectToChat () {
            Echo.private(`orders.${this.order.id}`)
                .listen('NewMessage', (e) => {
                    this.messages.push(e.message)
                    this.scrollToBottom()
                    var audio = new Audio('/notification.ogg');
                    audio.play();
                });
                this.scrollToBottom()
        },
        sendMessage() {
            let message = this.message
            if(message != '') {
                this.message = ''
                axios.post(route('messages.store', this.order.id), {
                    body: message
                }).then(res => {
                    this.messages.push(res.data)
                    this.scrollToBottom()
                })
            }
        },
        scrollToBottom() {
            setTimeout(() => {
                var container = this.$el.querySelector(".chat-messages");
                container.scrollTop = container.scrollHeight;
            }, 100)
        }
    }
}
</script>

<style>
    
    .chat-messages {
        min-height: 400px;
        max-height: 400px;
        overflow: auto;
    }
    .message-text {
        border-radius: 5px;
        position: relative;
        padding: 5px 10px;
        background: #d2d6de;
        border: 1px solid #d2d6de;
        margin: 5px 0 0 50px;
        color: #444;
    }
    .message-text:after,
    .message-text:before {
        position: absolute;
        right: 100%;
        top: 15px;
        border: solid transparent;
            border-top-width: medium;
            border-right-color: transparent;
            border-right-width: medium;
            border-bottom-width: medium;
            border-left-width: medium;
        border-right-color: #d2d6de;
        content: ' ';
        height: 0;
        width: 0;
        pointer-events: none;
    }
    .message-text:before {
        border-width: 6px;
        margin-top: -6px;
    }
    .message-avatar {
        border-radius: 50%;
        float: left;
        width: 40px;
        height: 40px;
    }
    .message-metadata {
        display: block;
        margin-bottom: 2px;
        font-size: 12px;
    }
    .message {
        width: 100%;
    }
    .right .message-avatar {
        float: right;
    }
    .right > .message-text {
        background: #f39c12;
        border-color: #f39c12;
        color: #fff;
    }
    .right .message-text {
        margin-right: 50px;
        margin-left: 0;
    }

    .right .message-text:after, .right .message-text:before {
        border-left-color: #f39c12 !important;
    }

    .right .message-text:after, .right .message-text:before {
        right: auto;
        left: 100%;
        border-right-color: transparent;
        border-left-color: #d2d6de;
    }
</style>
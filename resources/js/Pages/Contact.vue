<template>
    <frontend>
        <div class="container my-4">
            <div class="text-center mb-6">
                <h1>Contact</h1>
                <p>You can contact us in several ways. Choose the most appropriate for you.</p>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="alert alert-success" v-if="alert">
                        Your message has been sent successfully. We will contact you as soon as possible.
                    </div>
                    <form @submit.prevent="send" method="POST">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" v-model="form.name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="email" v-model="form.email" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Your Question</label>
                            <textarea name="" required v-model="form.message" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-primary" :disabled="loading"><b-spinner small v-if="loading"></b-spinner> Send</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </frontend>
</template>

<script>
    import Frontend from '@/Layouts/Frontend'

    export default {
        components: {
            Frontend
        },
        data() {
            return {
                loading: false,
                alert: false,
                form: {
                    name: '',
                    email: '',
                    message: ''
                }
            }
        },
        methods: {
            send() {
                this.loading = true
                axios.post(route('sendContact', this.form)).then(res => {
                    this.alert = true
                    this.loading = false
                    let clear = {
                        name: '',
                        email: '',
                        message: ''
                    }
                    this.form = clear
                }).catch(err => {
                    this.loading = false
                })
            }
        }
    }
</script>

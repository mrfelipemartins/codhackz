<template>
    <frontend>
        <div class="container">
            <div class="text-center pt-4">
                <h2>Login to your Account</h2>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card my-4">
                        <div class="card-body">
                            <jet-validation-errors class="mb-4" />

                            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                                {{ status }}
                            </div>

                            <form @submit.prevent="submit" class="login-form">
                                <div class="form-group">
                                    <jet-label for="email" value="Email" />
                                    <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
                                </div>

                                <div class="form-group">
                                    <jet-label for="password" value="Password" />
                                    <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
                                </div>

                                <div class="form-group">
                                    <label class="flex items-center">
                                        <jet-checkbox name="remember" v-model="form.remember" />
                                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                    </label>
                                </div>

                                <div>
                                    <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        <span v-if="form.processing" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Login
                                    </jet-button>
                                </div>
                                <inertia-link v-if="canResetPassword" :href="route('password.request')" class="text-center text-sm mt-2">
                                    Forgot your password?
                                </inertia-link>
                                <inertia-link v-if="canResetPassword" :href="route('register')" class="text-center text-sm mt-2">
                                    Don't have an account? Create Now
                                </inertia-link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </frontend>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import Frontend from '@/Layouts/Frontend'

    export default {
        components: {
            Frontend,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>

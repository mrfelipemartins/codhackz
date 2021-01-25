<template>
    <frontend>
        <div class="container">
            <div class="text-center pt-4">
                <h2>Create your Account</h2>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card my-4">
                        <div class="card-body">
                            <jet-validation-errors class="mb-4" />

                            <form @submit.prevent="submit">
                                <div>
                                    <jet-label for="name" value="Name" />
                                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                                </div>

                                <div class="mt-4">
                                    <jet-label for="email" value="Email" />
                                    <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                                </div>

                                <div class="mt-4">
                                    <jet-label for="password" value="Password" />
                                    <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                                </div>

                                <div class="mt-4">
                                    <jet-label for="password_confirmation" value="Confirm Password" />
                                    <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                                </div>

                                <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                                    <jet-label for="terms">
                                        <div class="flex items-center">
                                            <jet-checkbox name="terms" id="terms" v-model="form.terms" />

                                            <div class="ml-2">
                                                I agree to the <a target="_blank" :href="route('terms.show')" >Terms of Service</a> and <a target="_blank" :href="route('policy.show')">Privacy Policy</a>
                                            </div>
                                        </div>
                                    </jet-label>
                                </div>

                                <div class="mt-4">

                                    <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                       <span v-if="form.processing" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Register
                                    </jet-button>
                                </div>
                                <div class="text-center mt-2">
                                    <inertia-link :href="route('login')">
                                        Already registered?
                                    </inertia-link>
                                </div>
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
    import JetCheckbox from "@/Jetstream/Checkbox";
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import Frontend from '@/Layouts/Frontend'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Frontend
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>

<template>
    <dashboard>
        <template #content>
            <div class="bg-gray-800 rounded p-4">
                <div class="form-group">
                    <label>Login</label>
                    <input type="text" class="form-control" v-model="form.login">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" v-model="form.password">
                </div>
                <div class="form-group">
                    <label>Birthdate</label>
                    <input type="date" class="form-control" v-model="form.birthdate">
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" class="form-control" v-model="form.link">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea rows="3" class="form-control" v-model="form.description"></textarea>
                </div>
                <div class="float-right">
                    <inertia-link :href="route('accounts.index')" class="btn btn-primary">CANCEL</inertia-link>
                    <button class="btn btn-success" :disabled="loading" @click="save"><b-spinner small v-if="loading"></b-spinner> Save</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </template>
    </dashboard>
</template>

<script>
    import Dashboard from '@/Layouts/Dashboard'

    export default {
        props: ['account'],
        data () {
            return {
                user: this.$inertia.page.props.user,
                loading: false,
                form: {
                    login: this.account.login,
                    password: this.account.password,
                    birthdate: this.account.birthdate,
                    link: this.account.link,
                    description: this.account.description
                }
            }
        },
        components: {
            Dashboard
        },
        methods: {
            save() {
                this.loading = true
                this.$inertia.patch(route('accounts.update', this.account.id), this.form).then(res => {
                    this.loading = false
                })
            }
        }
    }
</script>
<template>
    <div v-if="hasErrors">
        <div class="alert alert-danger">
            <ul class="list-disc list-inside text-sm p-0 m-0">
                <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            errors() {
                return this.$page.props.errors
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
        }
    }
</script>

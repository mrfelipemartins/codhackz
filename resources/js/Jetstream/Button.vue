<template>
    <button :type="type" class="btn btn-primary btn-block" style="margin-left: 0 !important;">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    }
</script>

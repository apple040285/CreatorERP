<template>

</template>
<script>

export default ({
    data() {
        return {
            id: ''
        }
    },
    mounted() {
        if(this.$route.query.id) this.id = this.$route.query.id;
    },
})
</script>

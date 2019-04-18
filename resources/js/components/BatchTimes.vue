<template>
    <div>
        
        <form action="">
            <input type="text" :value="val" readonly>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        val: String,
    },
    data() {
        return {
            results: null,
        }
    },
    created() {
        window.axios
            
    }
}
</script>

<style>

</style>

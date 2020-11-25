<template>
    <div>
        <p>{{ this.header }}</p>

    </div>
</template>

<script>
    export default {
          props:{
            nombre: {
                type: String,
                required:true
            },
            apellido: {
                type: String,
                required: true
            },
            header: {
                type: String,
                required: true
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>


<template>
    <div>
        <p>{{message.message}}</p>
        <small>{{message.user.nombre}}</small>
    </div>
</template>
<script>
export default {
    props: ['message']
}
</script>
<style>

</style>


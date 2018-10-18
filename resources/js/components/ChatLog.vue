<template>
    <div class="chat-log">
        <chat-message v-for="(message, i) in messages" :key="i" :message="message"></chat-message>
        <div class="empty" v-show="messages.lenght === 0">
            No hay mensajes. ¡Escribe uno!
        </div>
    </div>
</template>
<script>
export default {
    props: ['messages']
}
</script>
<style>

</style>


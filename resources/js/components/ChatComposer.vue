<template>
    <div class="chat-composer">
        <input type="text" placeholder="Escribe un mensaje..." v-model="messageText" @keyup.enter="sendMessage">
        <button class="btn btn-primary" @click="sendMessage">Enviar</button>
    </div>
</template>
<script>
export default {
    data(){
        return {
            messageText: ''
        }
    },
    methods: {
        sendMessage() {
            //console.log(this.messageText);
            //evento de enviar mensaje
            this.$emit('messagesent',{
                message: this.messageText,
                user: {
                    nombre: $('.menu .nav-link .dropdown-toggle').text()
                }
            });
            this.messageText = '';
        }
    }
}
</script>
<style>
    .chat-composer{
        display: flex;
    }
    .chat-composer input{
        flex: 1 auto;
    }
</style>


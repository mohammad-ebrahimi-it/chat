<template>
    <div class="chat__messages" ref="message">
        <message v-for="message in messages" :key="message.id" :message="message"></message>
    </div>

</template>

<script>
import Bus from "../bus";
export default {
    data() {
        return{
            messages: []
        }
    },
    mounted() {
        axios.get('chat/messages').then((response) => {
            this.messages = response.data[0]
        })

        Bus.$on('message.added', (message) => {
            this.messages.unshift(message)
            if(message.selfOwned)
                this.$refs.message.scrollTop = 0
        })
    }
}
</script>

<style lang="scss">
.chat {
    &__messages {
        height: 400px;
        max-height: 400px;
        overflow-y: scroll;
    }
}
</style>

<template>
    <div class="chat">
        <messages></messages>
        <form action="#" class="chat__form">
            <textarea
                id="body"
                cols="30"
                rows="4"
                v-model="body"
                @keydown="handleMessageInput"
                class="chat__form-input"
            ></textarea>
            <span class="chat__form-helptext">
                برای ارسال پیام Enter و برای خط ایجاد خط جدید Shift+Enter را فشار دهید
            </span>
        </form>

    </div>
</template>

<script>
import Bus from "../bus";
import moment from "moment";
export default {

    data() {
        return {
            body: null,
            bodyBackUp: null
        }
    },
    methods: {
        handleMessageInput(e) {
            this.bodyBackUp = this.body
            if (e.keyCode === 13 && !e.shiftKey) {
                this.send()
                e.preventDefault();
            }
        },
        buildTempMessage(){
            let tempId =  Date.now();
            return {
                id: tempId,
                body: this.body,
                created_at: moment().format('YYYY-MM-DD HH:mm'),
                selfOwned:true,
                user: {
                    name:user.name
                }
            }
        },
        send() {
            if (!this.body || this.body.trim() === ''){
                return
            }
            let tempMessage = this.buildTempMessage();
            Bus.$emit('message.added', tempMessage);

            axios.post('/chat/messages', {
                body: this.body.trim()
            }).catch((error) => {
                this.body = this.bodyBackUp
                Bus.$emit('message.removed', tempMessage)
                console.log(error)
            })

            this.body = null
        }
    }
}
</script>
<style lang="scss">
.chat {
    background-color: #fff;
    border: 1px solid #d3e0e9;
    border-radius: 3px;
    margin-bottom: 20px;

    &__form {
        border-top: 1px solid #d3e0e9;
        padding: 10px;

        &-input {
            width: 100%;
            border: 1px solid #d3e0e9;
            padding: 5px 10px;
            outline: none;
        }

        &-helptext {
            color: #aaa;
        }
    }
}
</style>

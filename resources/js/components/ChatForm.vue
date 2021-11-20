<template>
<div class="input-group">
    <input id="btn-input" type="text" name="message" class="form-control input-group-sm" placeholder="Napisz powiadomienie..."
           v-model="newMessage" @keyup.enter="sendMessage"/>
    <span class="input-group">
        <button class="btn btn-dark btn-sm" id="btn-chat" @click="sendMessage">
            Wyślij
        </button>
    </span>
</div>
</template>

<script>

export default {
    props: ["user"],
    data() {
        return {
            newMessage: "",
        };
    },
    methods: {
        sendMessage() {
            this.$emit("messagesent", {
                user: this.user,
                message: this.newMessage,
            });
            this.newMessage = "";
        },
    },
};
</script>

<style scoped>

</style>

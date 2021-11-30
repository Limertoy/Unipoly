<template>
<div class="input-group">
    <button class="btn btn-lg btn-info" id="btn-chat" @click="joinLobby">
        Dołącz
    </button>
</div>
</template>

<script>

export default {
    name: "lobby-join",
    props: ['lobby'],
    data() {
        return {
            newLobby: "",
        };
    },
    methods: {
        joinLobby() {
            this.$emit("joinlobby", {
                user: this.user,
                lobby: this.lobby,
            });
        },
    },
};
</script>

<style scoped>

</style>

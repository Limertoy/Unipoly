<template>
<div class="input-group">
        <button class="btn btn-lg btn-info" id="btn-chat" @click="createLobby">
            Nowa poczekalnia
        </button>
</div>
</template>

<script>

export default {
    props: ["user"],
    data() {
        return {
            newLobby: "",
        };
    },
    methods: {
        createLobby() {
            this.$emit("createlobby", {
                user: this.user,
                lobby: this.newLobby,
            });
            this.newLobby = "";
        },
    },
};
</script>

<style scoped>

</style>

<template>
    <div style="text-align: center">
        Poczekania numer #{{ lobby }}
    </div>
</template>

<script>
export default {
    name: "LobbyShow",
    props: ['lobby', 'user', 'leader']
}
</script>

<style scoped>

</style>

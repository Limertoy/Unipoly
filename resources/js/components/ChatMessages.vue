<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages" :key="message.id">
            <div class="clearfix">
                <div class="card-header">
                    <strong>
                        {{ message.user.name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    name: "chat-messages",
    props: ['messages']
}
</script>

<style scoped>

</style>

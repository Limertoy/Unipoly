import Vue from 'vue'
import ChatMessages from "./components/ChatMessages";
import ChatForm from "./components/ChatForm";

require('./bootstrap');

require('phaser');

// Vue.component('chat-messages', require('./components/ChatMessages'));
// Vue.component('chat-form', require('./components/ChatForm'));

const app = new Vue({
    components: {
        'chat-messages': ChatMessages,
        'chat-form': ChatForm
    },
    el: '#app',
    data: {
        messages: []
    },
    created() {
        this.fetchMessages();
    },
    methods: {
        fetchMessages() {

            axios.get('/messages').then(response => {

                this.messages = response.data;
            }).catch((err) => console.log(err));
        },
        addMessage(message) {

            this.messages.push(message);

            axios.post('/messages', message).then(response => {
                console.log(response.data);
            }).catch((err) => console.log(err));
        }
    }
});

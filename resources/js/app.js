require('./bootstrap');

import Vue from 'vue';

//IMPORT KEDUA COMPONENT TERSEBUT
import Messages from './components/Messages.vue'
import Form from './components/Form.vue'

//REGISTER COMPONENT TERSEBUT SECARA GLOBAL
//PARAMETER PERTAMA ADALAH CUSTOM TAG YANG DIINGINKAN, PARAMETER KEDUA ADALAH NAMA COMPONENTNYA
Vue.component('dw-messages', Messages);
Vue.component('dw-form', Form);

const app = new Vue({
    el: '#app',

    data: {
        //VARIABLE UNTUK MENAMPUNG DATA PESAN
        messages: []
    },

    //KETIKA FILE INI DI-LOAD ATAU AKAN DI-RENDER OLEH BROWSER
    created() {
        //MAKA AKAN MENJALANKAN FUNGSI fetchMessage()
        this.fetchMessages();

        //DAN MENGGUNAKAN LARAVEL ECHO, KITA AKSES PRIVATE CHANNEL BERNAMA CHAT YANG NNTINYA AKAN DIBUAT
        //KEMUDIAN EVENTNYA KITA LISTEN ATAU PANTAU JIKA ADA DATA YANG DIKIRIM 
        Echo.private('chat')
            .listen('MessageSent', (e) => {
                //DATA YANG DITERIMA AKAN DITAMBAHKAN KE DALAM VARIABLE MESSAGES SEBELUMNYA
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                })
            })
    },
    methods: {
        //FUNGSI FETCH MESSAGE UNTUK MEMINTA DATA DARI DATABASE TERKAIT PESAN YANG SUDAH LAMPAU
        fetchMessages() {
            //MENGGUNAKAN AXIOS UNTUK MELAKUKAN AJAX REQUEST
            axios.get('/messages').then(response => {
                //SETIAP DATA YANG DITERIMA AKAN DITAMBAHKAN KE VARIABLE MESSAGES
                this.messages = response.data;
            });
        },

        //INGAT EMIT YANG DIKIRIM? AKAN DI-HANDLE DISINI
        //CARA TRACE-NYA GIMANA? PERHATIKAN FILE CHAT.BLADE.PHP, TERDAPAT ATTRIBUTE v-on:sent="addMessage" DI DALAM TAG DW-FORM
        //YANG BERARTI KETIKA EMIT BERNAMA SENT DITERIMA, MAKA AKAN MEMICU FUNGIS addMessage
        addMessage(message) {
            //PESAN YANG DITERIMA AKAN DITAMBAHKAN KE VARIABLE MESSAGE
            this.messages.push(message);

            //KEMUDIAN AKAN DISIMPAN KE DATABASE SEBAGAI LOG
            axios.post('/messages', message).then(response => {
                console.log(response.data);
            });
        }
    }
});
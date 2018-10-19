
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        msg:'algo:',
        content: '',
        privateMsgs: [],
        singleMsgs: [],
        msgFrom: '',
        conID: ''
    },
    ready: function(){
        this.created();
    },
    created(){
        axios.get('http://localhost/softskills/public/getMessages')
            .then(response =>{
                console.log(response.data); //correcto
                this.privateMsgs = response.data;
            })
            .catch(function(error){
                console.log(error);
            });
    },
    methods:{
        messages: function(id){
            axios.get('http://localhost/softskills/public/getMessages/'+id)
            .then(response =>{
                console.log(response.data); //correcto
                this.singleMsgs = response.data;                
                this.conID = response.data[0].conversation_id;
            })
            .catch(function(error){
                console.log(error);
            });
        },
        inputHandler(e){
            if(e.keyCode === 13 && !e.shiftKey){
                e.preventDefault();
                this.sendMsg();
            }
        },
        sendMsg(){
            if(this.msgFrom){
                //alert(this.conID + this.msgFrom);
                axios.post('http://localhost/softskills/public/sendMessage', {
                    conID: this.conID,
                    msg: this.msgFrom
                })
                .then(function(response){
                    console.log(response.data);
                    if(response.status===200){ //si se envio correctamente
                        this.singleMsgs = response.data; //guardar
                    }
                })
                .catch(function(error){
                    console.log(error);
                });
            }
        }
    }
    
});

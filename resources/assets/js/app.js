
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

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

Vue.component('VueSimpleNotify', require('./components/VueSimpleNotify.vue'));

const app = new Vue({
    el: '#app',

    data () {
        return {
            items: []
        }
    },
    created() {
        if(userID){
            window.Echo.private('reply.' + userID).listen('ReplyCreated', e => {
                this.items.push({
                    type: 'Новый ответ на отзыв id:' + e.reply.feedback.id,
                    color: '#2ecc71',
                    message:e.reply.body,
                })
            });
        }
        window.Echo.channel('feedback').listen('FeedbackCreated', e => {
            this.items.push({
                type: 'Новый отзыв id:' + e.feedback.id,
                color: '#2ecc71',
                message:e.feedback.body,
            })
        });
    }
});





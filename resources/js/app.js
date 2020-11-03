require('./bootstrap');

window.Vue = require('vue');

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
import moment from 'moment';
window.toast = toast;

Vue.filter('dateHuman', function(created){
  return moment(created).locale('es').fromNow();
});

import VueRouter from 'vue-router'
Vue.use(VueRouter)


Vue.component('chat-vue', require('./components/Chat.vue').default);

const app = new Vue({
    el: '#app'
});
window.Vue = require('vue');

Vue.component('test-component', require('./components/test.vue').default);

const app = new Vue({
  el: '#app',
});

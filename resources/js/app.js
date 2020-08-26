window.Vue = require('vue');

Vue.component('categories', require('./components/tasks/Categories').default);

const app = new Vue({
  el: '#app',
});

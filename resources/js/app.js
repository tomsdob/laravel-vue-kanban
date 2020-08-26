import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
window.Vue = require('vue');

Vue.component("categories", require("./components/tasks/Categories").default);

const app = new Vue({
  el: "#app",
});

// CKEditor
ClassicEditor
.create(document.querySelector('#ckeditor'), {
  toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList' ]
})
.then(editor => {
  console.log(editor);
})
.catch(error => {
  console.error(error);
});

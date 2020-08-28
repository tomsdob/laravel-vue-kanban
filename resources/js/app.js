import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
window.Vue = require('vue');

Vue.component("categories", require("./components/tasks/Categories").default);

const app = new Vue({
  el: "#app",
});

// CKEditor
ClassicEditor
.create(document.querySelector('#ckeditor'), {
  toolbar: {
    items: [
      'bold',
      'italic',
      'link',
      'undo',
      'redo'
    ]
  }
})
.then(editor => {
  console.log(editor);
})
.catch(error => {
  console.error(error);
});

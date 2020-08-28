<template>
  <div class="p-4 md:p-0 hidden fixed inset-0 flex justify-center items-center w-full h-full z-10"
       :id="'toggleEdit_' + updateTask.id"
  >
    <div class="p-4 rounded-lg bg-white z-20 w-full max-w-screen-sm">
      <h3 class="mb-6 text-xl font-medium text-gray-800 leading-5">Edit a task</h3>
      <form method="POST" :action="'/tasks/' + updateTask.id" class="flex flex-col space-y-4">
        <label>
          <span class="mb-2 block text-base font-normal text-gray-800 leading-5">Title</span>
          <input class="form-input w-full"
                 placeholder="Task title..."
                 name="title"
                 type="text"
                 required
                 v-model="updateTask.title"
          >
        </label>
        <div class="mt-4">
          <span class="mb-2 block text-base font-normal text-gray-800 leading-5">Description</span>
          <ckeditor :editor="editor" v-model="updateTask.description" :config="editorConfig"></ckeditor>
        </div>
        <div class="grid md:grid-cols-2 md:gap-x-4 gap-y-4 md:gap-y-0">
          <label>
            <span class="mb-2 block text-base font-normal text-gray-800 leading-5">Due date</span>
            <input class="px-3 py-2 text-base font-normal text-gray-800 w-full border rounded-lg focus:outline-none focus:shadow-outline"
                   placeholder="Due date..."
                   name="due_date"
                   type="date"
                   v-model="updateTask.due_date"
            >
          </label>
          <label>
            <span class="mb-2 block text-base font-normal text-gray-800 leading-5">Badge/project</span>
            <select class="form-select w-full"
                    name="badge"
                    v-model="updateTask.badge"
            >
              <option value="">Project...</option>
              <option value="zaimo.com.ua">Zaimo</option>
              <option value="zaimiplus.com.ua">Zaimiplus</option>
              <option value="zaimi365.com.ua">Zaimi365</option>
              <option value="vayonlineapp.vn">Vayonlineapp</option>
            </select>
          </label>
        </div>
        <button class="px-3 py-2 flex justify-center items-center text-base font-medium text-white text-center rounded-lg bg-primary hover:bg-primary_dark transition duration-300 transform hover:-translate-y-1 hover:shadow-md ease focus:outline-none focus:shadow-outline"
                type="button"
                v-on:click="editTask(updateTask.id); toggleEdit(updateTask.id);"
        >
          Edit
        </button>
      </form>
    </div>
    <div class="absolute inset-0 w-full h-full bg-black bg-opacity-25 z-10" v-on:click="toggleEdit(updateTask.id)"></div>
  </div>
</template>

<script>
import axios from "axios";
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

Vue.use( CKEditor );

export default {
  name: "Edit",
  props: [
    "task",
  ],
  data: function() {
    return {
      updateTask: this.task,
      // CKEditor
      editor: ClassicEditor,
      editorData: '<p>Content of the editor.</p>',
      editorConfig: {
        toolbar: {
          items: [
            'bold',
            'italic',
            'link',
            'undo',
            'redo'
          ]
        }
      }
    }
  },
  mounted() {
    console.log(this.updateTask);
  },
  methods: {
    toggleEdit: function(id) {
      document.getElementById('toggleEdit_' + id).classList.toggle("hidden");
    },
    // Editing a task
    editTask: function(id) {
      axios.patch("/tasks/" + id, {
        // Fetching the required variables
        title: this.updateTask.title,
        description: this.updateTask.description,
        due_date: this.updateTask.due_date,
        badge: this.updateTask.badge,
        category: this.updateTask.category,
      })
      .then(function (response) {
        console.log(response.status);
      });
    },
  }
}
</script>

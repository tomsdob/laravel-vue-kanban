<template>
  <div class="hidden fixed inset-0 flex justify-center items-center w-full h-full z-10"
       :id="'toggleEdit_' + updateTask.id"
  >
    <div class="p-4 rounded-lg bg-white z-20 w-full max-w-screen-sm">
      <h3 class="mb-4 text-xl font-medium text-gray-600 leading-5">Edit a task</h3>
      <form method="POST" :action="'/tasks/' + updateTask.id" class="flex flex-col space-y-4">
        <label>
          <input class="form-input w-full"
                 placeholder="Task title..."
                 name="title"
                 type="text"
                 required
                 v-model="updateTask.title"
          >
        </label>
        <label>
          <textarea class="form-input w-full"
                    id="ckeditor"
                    placeholder="Task description..."
                    name="description"
                    v-model="updateTask.description"
          ></textarea>
        </label>
        <label>
          <input class="px-3 py-3 text-base font-normal text-gray-400 leading-6 w-full border rounded-lg focus:outline-none focus:shadow-outline"
                 placeholder="Due date..."
                 name="due_date"
                 type="date"
                 v-model="updateTask.due_date"
          >
        </label>
        <label>
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
        <button class="px-3 py-2 flex justify-center items-center text-base font-medium text-white text-center rounded-lg bg-blue-600 hover:bg-blue-800 transition-all duration-200 focus:outline-none focus:shadow-outline"
                type="button"
                v-on:click="editTask(updateTask.id), toggleEdit(updateTask.id)"
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

export default {
  name: "Edit",
  props: [
    "task",
  ],
  data: function() {
    return {
      updateTask: this.task,
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

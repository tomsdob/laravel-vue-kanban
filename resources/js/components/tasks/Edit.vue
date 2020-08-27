<template>
  <div class="hidden fixed inset-0 flex justify-center items-center w-full h-full z-10"
       :id="'toggleEdit_' + this.id"
  >
    <div class="p-4 rounded-lg bg-white z-20 w-full max-w-screen-sm">
      <h3 class="mb-4 text-xl font-medium text-gray-600 leading-5">Edit a task</h3>
      <form method="POST" :action="'/tasks/' + this.id" class="flex flex-col space-y-4">
        <label>
          <input class="form-input w-full"
                 v-model="updatedTitle"
                 placeholder="Task title..."
                 name="title"
                 type="text"
                 required
          >
        </label>
        <label>
          <textarea class="form-input w-full" id="ckeditor" placeholder="Task description..." name="description" v-model="updatedDescription"></textarea>
        </label>
        <label>
          <input class="px-3 py-3 text-base font-normal text-gray-400 leading-6 w-full border rounded-lg focus:outline-none focus:shadow-outline"
                 v-model="updatedDue_date"
                 placeholder="Due date..."
                 name="due_date"
                 type="date"
          >
        </label>
        <label>
          <select class="form-select w-full"
                  name="badge"
                  v-model="updatedBadge"
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
                v-on:click="editTask(id)"
        >
          Edit
        </button>
      </form>
    </div>
    <div class="absolute inset-0 w-full h-full bg-black bg-opacity-25 z-10" v-on:click="toggleEdit(id)"></div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Edit",
  props: [
    "id",
    "title",
    "description",
    "due_date",
    "badge",
    "category",
  ],
  data: function() {
    return {
      updatedTitle: this.title,
      updatedDescription: this.description,
      updatedDue_date: this.due_date,
      updatedBadge: this.badge,
      updatedCategory: this.category,
    }
  },
  mounted() {
    console.log(this.title);
  },
  methods: {
    toggleEdit: function(id) {
      document.getElementById('toggleEdit_' + id).classList.toggle("hidden");
    },
    // Editing a task
    editTask: function(id) {
      axios.patch("/tasks/" + id, {
        // Fetching the required variables
        title: this.updatedTitle,
        description: this.updatedDescription,
        due_date: this.updatedDue_date,
        badge: this.updatedBadge,
        category: this.updatedCategory,
      })
      .then(function (response) {
        console.log(response.status);
      });
    },
  }
}
</script>

<template>
  <draggable class="p-3 space-y-4 block rounded-lg bg-gray-100"
             :data-id="this.category"
             :options="{ animation: 200 }"
             :sort="true"
             v-model="tasksData"
             group="tasks"
             tag="div"
             @change="log"
             @add="onAdd"
  >
    <div v-for="task in tasksData"
         :data-id="task.id"
         :data-title="task.title"
         :key="task.id"
    >
      <div class="p-3 space-y-3 flex flex-col justify-start items-start rounded-lg bg-white cursor-pointer"
           v-on:click="toggleEdit(task.id)"
      >
        <div>
          <span class="px-2 py-1 text-sm font-medium text-purple-800 leading-none bg-purple-400 rounded-full">{{ task.badge }}</span>
        </div>
        <span class="text-base font-medium text-gray-800 leading-5">{{ task.title }}</span>
        <div class="flex items-center text-sm font-medium text-gray-500">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="mr-1 w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          <span>{{ moment(task.due_date) }}</span>
        </div>
      </div>
      <Edit :task="task" />
    </div>
  </draggable>
</template>

<script>
import Edit from "./Edit";
import draggable from "vuedraggable";
import axios from "axios";
import moment from "moment";

export default {
  name: "Task",
  order: 1,
  components: {
    draggable,
    Edit
  },
  props: [
    "tasks",
    "category"
  ],
  data: function () {
    return {
      // Setting the props as data
      tasksData: this.tasks,
    }
  },
  methods: {
    log: function(event) {
      // Checking on events happening
      window.console.log(event);
    },
    // Function that gets executed when task is added to a category
    onAdd: function(event) {
      // Fetching task id
      let id = event.item.getAttribute("data-id");
      axios.patch("/tasks/" + id, {
        // Updating task title, category (title is just required)
        title: event.item.getAttribute("data-title"),
        category: event.to.getAttribute("data-id")
      })
      window.console.log(event);
    },
    moment: function(date) {
      return moment(date).format('D MMM');
    },
    toggleEdit: function(id) {
      document.getElementById('toggleEdit_' + id).classList.toggle("hidden");
    }
  },
  mounted() {
    console.log(this.tasksData);
  }
}
</script>

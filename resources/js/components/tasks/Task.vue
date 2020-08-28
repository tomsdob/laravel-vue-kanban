<template>
  <draggable class="p-3 pb-8 md:pb-3 space-x-4 md:space-x-0 md:space-y-4 flex md:block md:rounded-lg md:bg-gray-100"
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
         :data-description="task.description"
         :data-badge="task.badge"
         :data-due_date="task.due_date"
         :key="task.id"
    >
      <div class="p-3 flex flex-col justify-start items-start rounded-lg bg-white border md:border-none cursor-pointer w-64 md:w-auto h-full"
           v-on:click="toggleEdit(task.id)"
      >
        <div class="mb-3 flex justify-between items-center">
          <span class="px-2 p-1 text-xs font-medium text-purple-800 leading-none uppercase bg-purple-200 rounded-lg">{{ task.badge }}</span>
          <div class="flex justify-end items-center">
            <div class="w-6 h-6">
              <img
                  src=""
                  alt=""
              >
            </div>
          </div>
        </div>
        <span class="mb-3 text-base font-medium text-gray-800 leading-5">{{ task.title }}</span>
        <!-- Checking if the due date is past today's date -->
        <div class="mt-auto">
          <div v-if="task.due_date === null" class="flex items-center text-sm font-medium text-gray-500">
            <span>No due date</span>
          </div>
          <div v-else-if="task.due_date >= dueDate(new Date())" class="flex items-center text-sm font-medium text-gray-500">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="mr-1 w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>{{ moment(task.due_date) }}</span>
          </div>
          <div v-else class="flex items-center text-sm font-medium text-red-500">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="mr-1 w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>{{ moment(task.due_date) }}</span>
          </div>
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
        description: event.item.getAttribute("data-description"),
        badge: event.item.getAttribute("data-badge"),
        due_date: event.item.getAttribute("data-due_date"),
        category: event.to.getAttribute("data-id")
      })
      window.console.log(event);
    },
    moment: function(date) {
      return moment(date).format('MMM D');
    },
    dueDate: function(date) {
      return moment(date).format('YYYY-MM-DD');
    },
    toggleEdit: function(id) {
      document.getElementById('toggleEdit_' + id).classList.toggle("hidden");
    }
  },
  mounted() {
    console.log(this.due_date, new Date());
  }
}
</script>

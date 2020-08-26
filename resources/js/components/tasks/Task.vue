<template>
  <draggable class="p-3 space-y-4 block rounded-lg bg-gray-100"
             :data-id="this.category"
             v-model="tasksData"
             group="tasks"
             tag="ul"
             @change="log"
             @add="onAdd"
  >
    <li class="p-3 space-y-3 flex flex-col justify-start items-start rounded-lg bg-white"
        v-for="task in tasksData"
        :data-id="task.id"
        :data-title="task.title"
        :key="task.id"
    >
      <div>
        <span class="px-2 py-1 text-sm font-medium text-purple-800 leading-none bg-purple-400 rounded-full">{{ task.badge }}</span>
      </div>
      <span class="text-base font-medium text-gray-800 leading-5">{{ task.title }}</span>
      <div class="text-sm font-medium text-gray-500">
        <span>{{ task.created_at }}</span>
        <span>Due date</span>
      </div>
    </li>
  </draggable>
</template>

<script>
import draggable from "vuedraggable";
import axios from "axios"

export default {
  name: "Task",
  order: 1,
  components: {
    draggable
  },
  props: [
    "tasks",
    "category"
  ],
  data: function () {
    return {
      tasksData: this.tasks
    }
  },
  methods: {
    log: function(event) {
      window.console.log(event);
    },
    onAdd: function(event, category) {
      let id = event.item.getAttribute("data-id");
      axios.patch("/tasks/" + id, {
        title: event.item.getAttribute("data-title"),
        category: event.to.getAttribute("data-id")
      })
      window.console.log(event);
    }
  },
  mounted() {
    console.log(this.tasksData);
  }
}
</script>

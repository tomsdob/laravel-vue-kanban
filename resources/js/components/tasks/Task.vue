<template>
  <draggable class="p-3 space-y-4 block rounded-lg bg-gray-100"
             :list="tasksData"
             group="tasks"
             tag="ul"
             @change="log"
  >
    <li v-for="task in tasksData" :key="task.id" class="p-3 space-y-3 flex flex-col justify-start items-start rounded-lg bg-white">
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
import draggable from 'vuedraggable';

export default {
  name: "Task",
  order: 1,
  components: {
    draggable
  },
  props: [
    'tasks',
    'category'
  ],
  data: function () {
    return {
      tasksData: this.tasks
    }
  },
  methods: {
    log: function(evt) {
      window.console.log(evt);
    }
  },
  mounted() {
    console.log(this.tasksData);
  }
}
</script>

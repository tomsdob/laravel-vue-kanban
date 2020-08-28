<template>
  <!-- Category container -->
  <div class="grid md:grid-cols-3 gap-y-8 md:gap-y-0 md:gap-x-8">
    <div class="overflow-x-scroll md:overflow-x-auto" v-for="category in categories" :key="category.id">
      <div class="mb-4 space-x-4 flex justify-start items-center block">
        <div v-if="category.emoji" class="p-2 flex justify-center items-center bg-white rounded-full shadow-md">
          <span>{{ category.emoji }}</span>
        </div>
        <span v-if="category.title" class="text-base font-medium text-gray-800 leading-5 uppercase">{{ category.title }}</span>
        <span class="text-base font-medium text-gray-500 leading-5 uppercase">{{ category.tasks.length }}</span>
      </div>
      <!-- Category array passed as prop with the correct tasks -->
      <!-- Category id passed as a prop for later axios use -->
      <Task :tasks="category.tasks" :category="category.id" :key="category.tasks.id"/>
    </div>
  </div>
</template>

<script>
import Task from './Task';
import axios from "axios";

export default {
  name: "Categories",
  components: {
    Task
  },
  data: function() {
    return {
      // Category array
      categories: [
        {id: 0, title: 'To do', emoji: '📦',tasks:[]},
        {id: 1, title: 'In progress', emoji: '🛠️',tasks:[]},
        {id: 2, title: 'Done', emoji: '✅',tasks:[]},
      ],
      // Tasks array
      tasks: {}
    }
  },
  methods: {
    // Clear object
    clearTasks() {
      for(let i = 0; i < this.categories.length; i++){
        this.categories[i].tasks.splice(0);
      }
    },
    // Iterating over tasks array to check in which category it belongs in
    // If task category id matches with category id, it gets added into
    // the correct categories array
    sortTasks() {
      for(let i = 0; i < this.tasks.length; i++){
        switch(this.tasks[i].category) {
          case 0:
            this.categories[0].tasks.push(this.tasks[i]);
            console.log("A task has been added to 'To do'")
            break;
          case 1:
            this.categories[1].tasks.push(this.tasks[i]);
            console.log("A task has been added to 'In progress'")
            break;
          case 2:
            this.categories[2].tasks.push(this.tasks[i]);
            console.log("A task has been added to 'Done'")
            break;
          default:
            console.log("Couldn't find a category")
        }
      }
    },
    // Fetching tasks from the DB via API
    fetchTasks() {
      axios.get('/tasks/fetch')
        .then(response => {
          this.clearTasks();
          this.tasks = response.data;
          this.sortTasks();
        })
        .catch(function (error) {
            console.log(error)
        })
    },
  },
  mounted () {
    // Fetch tasks function
    this.fetchTasks();
  }
}
</script>

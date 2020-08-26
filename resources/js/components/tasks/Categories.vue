<template>
  <!-- Category container -->
  <div class="grid grid-cols-3 gap-x-8">
    <div v-for="category in categories" :key="category.id">
      <div class="mb-4 block">
        <span class="text-base font-medium text-gray-500 leading-5 uppercase">{{ category.title }}</span>
      </div>
      <Task :tasks="category.tasks" :category="category.id" :key="category.tasks.id" />
    </div>
  </div>
</template>

<script>
import Task from './Task';

export default {
  name: "Categories",
  components: {
    Task
  },
  props: [
      'tasks'
  ],
  data: function() {
    return {
      categories: [
        {id: 0, title: 'To do', tasks:[]},
        {id: 1, title: 'In progress', tasks:[]},
        {id: 2, title: 'Done', tasks:[]},
      ]
    }
  },
  mounted () {
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
    // console.log(this.categories);
  }
}
</script>

<template>
    <div>{{this.categoryName}}</div>
</template>

<script>
export default {
  name: "Categories",

  data() {
    return {
      someData: {
      },
    };
  },

  computed: { 
    categoryName() {
      return this.$route.params.category;
    },
  }

};
</script>

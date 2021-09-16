<template>
    <card-views-layout :data="pageData" :title="title" :current_page="current_page"></card-views-layout>
</template>

<script>
import CardViewsLayout from './CardViewsLayout.vue';
export default {
  components: { CardViewsLayout },
  name: "FreeApps",

  data() {
    return {
      pageData: {
      },
      current_page: 1,
      title: '',
    };
  },

  async mounted() {
      const { name } = this.$route;
      const { page } = this.$route.query;

      let result; 

      !page 
          ? result =  await window.axios.get(this.path + '/apps/' + name)
          : result =  await window.axios.get(this.path + '/apps/' + `${name}?page=${page}`);
      
      
      console.log(result)
      this.title = result.data.data.title;
      this.pageData = result.data.data[0];
      this.current_page = this.pageData.current_page;
  },

  computed: {
    path() {
      const baseURL = new URL(url).protocol + '//' + window.location.host;
      const companyPath = url.replace(baseURL, '' );
      const path = baseURL + companyPath;

      return path;
    }
  }

};
</script>

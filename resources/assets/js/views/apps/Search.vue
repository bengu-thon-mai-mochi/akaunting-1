<template>
  <keep-alive>
    <card-views-layout :data="pageData" :title="title"></card-views-layout>
  </keep-alive>
</template>

<script>
import CardViewsLayout from './CardViewsLayout.vue';
export default {
  components: { CardViewsLayout },
  name: "Search",

  data() {
    return {
      pageData: {
      },
      last_page: 0,
      current_page: '1',
      title: '',
    };
  },

  mounted() {
    this.fetchData();
    this.$emit('update-page-limit', this.last_page);
  },
  
  methods: {
    async fetchData() {
      const result =  await window.axios.get(this.path + this.$route.fullPath);

      this.title = result.data.data.title;
      this.pageData = result.data.data[0];

      this.current_page= result.data.data[0].current_page;
      this.last_page = result.data.data[0].last_page;
    },

  },

  watch: {
    $route(currentPage){
      console.log(this.current_page)
      console.log(currentPage.query.page)
      currentPage.query.page > this.current_page 
        ? 
      this.fetchData(this.pageData.next_page_url)
        : 
      this.fetchData(this.pageData.prev_page_url)
    }
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

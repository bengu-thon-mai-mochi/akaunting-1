<template>
    <card-views-layout :data="pageData" :title="title"></card-views-layout>
</template>

<script>
import CardViewsLayout from './CardViewsLayout.vue';
export default {
  components: { CardViewsLayout },
  name: "Vendors",

  data() {
    return {
      pageData: {
      },
      current_page: '1',
      title: '',
    };
  },

  async created() {
      const { path } = this.$route;
      const result =  await window.axios.get(this.path + path);
      
      this.title = result.data.data.title;
      this.pageData = result.data.data[0];
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

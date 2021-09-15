<template>
  <keep-alive>
    <card-views-layout :data="pageData" :title="title"></card-views-layout>
  </keep-alive>
</template>

<script>
import CardViewsLayout from './CardViewsLayout.vue';
export default {
  components: { CardViewsLayout },
  name: "NewApps",

  data() {
    return {
      pageData: {
      },
      current_page: '1',
      title: '',
    };
  },

  async mounted() {
      const { name } = this.$route;
      const result =  await window.axios.get(this.path + '/apps/' + name);
      
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

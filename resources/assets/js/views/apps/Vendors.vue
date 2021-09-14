<template>
    <div>Vendors</div>
</template>

<script>
export default {
  name: "Vendors",

  data() {
    return {
      someData: {
      },
    };
  },

  async mounted() {
      const slug = this.$route.params.vendorname;
      const result = await window.axios.get(this.path + '/apps/vendors/' + slug);
      
      this.someData = result.data.data;
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

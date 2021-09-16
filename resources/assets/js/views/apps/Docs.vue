<template>
   <div class="card" v-show="pageData">
       <div class="card-body" v-html="pageData.body"></div>
       <div class="card-footer">
           <div class="row">
                <div class="col-md-12">
                    <router-link
                        :to="`/apps/${title}`" 
                        class="btn btn-white"
                    >
                    Back
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: "Docs",

  data() {
    return {
      pageData: {
      },
      title: '',
    };
  },

  async mounted() {
      this.title = this.$route.params.appName;

      let result = await window.axios.get(this.path + '/apps/' + this.title)

      this.pageData = result.data.data.documentation;
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

<style scoped>
.documentation-template {
    max-width: 100%;
}
</style>

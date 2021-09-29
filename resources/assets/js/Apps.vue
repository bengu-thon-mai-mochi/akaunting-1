<template>
<keep-alive>
  <div class="container-fluid content-layout mt--6 pt-6"> 
    <Header 
      :translations="this.$attrs.translations"
      :showButtons="showButtons"
    ></Header>
      <SearchBar 
        v-show="this.$route.name !== 'apiKey'" 
        :values="this.$attrs.categories"
        :url="this.$attrs.url"
        :translations="this.$attrs.translations"
        @handleSelect="filterByCategory"
        @handleSearch="filterByKeyword"
      ></SearchBar>
        <router-view 
            v-show="!isLoading" 
            :modules="pageData ? pageData : {}"
            :isInstalled="isInstalled"
            :installed= "installed"
            :translations="this.$attrs.translations"
            :url="this.$attrs.url"
            :token="this.$attrs.token"
          ></router-view>
        <div>
            <spinner class="text-center py-6" v-show="isLoading"></spinner>
        </div>
        <div v-if="!isLoading && last_page" >
          <router-view 
            name="paginationHelper"
            :last_page="last_page" 
            :translations="this.$attrs.translations"
            @handlePagination="handlePagination"
          ></router-view>
        </div>
      <notifications></notifications>
  </div>
  </keep-alive>
</template>

<script>

import Header from './views/apps/components/Header.vue';
import SearchBar from './views/apps/components/SearchBar.vue';
import Spinner from './views/apps/components/Spinner.vue';
import Global from './mixins/global';
import NoApp from './views/apps/components/NoApp.vue';

export default {
  name: "Apps",

  components: { 
    Header, 
    SearchBar,
    Spinner,
    NoApp
  },

  mixins: [  
    Global
  ],

  data() {
    return {
      isLoading: false,
      installed: [],
      isInstalled: [],
      isDisabled: false,
      formError: "",
      selectedCategory: "",
      last_page: 0,
      pageData: {},
    };
  },

  created() {
    this.isLoading = true;
  },

  async mounted() {
    if(api_key) {
      await window.axios.get(url + '/apps/my').then(res => {
          this.installed = res.data.data.installed;
          this.isInstalled = Object.keys(res.data.data.installed);
      }); 
      await this.getData();  
      this.setLastPage();
      this.pageData ? this.pageData.installed = this.pageData.slug : {};
      this.isLoading = false;
    }

    this.isLoading = false;
  },

  methods: {
    setLastPage() {
      if(this.pageData){
        this.pageData.modules 
          ? (
            this.last_page = this.pageData.modules.last_page, 
            this.current_page = this.pageData.modules.current_page
            )
          : this.last_page = 0;
      }

      this.isLoading = false;
    },

    filterByCategory(category) { 
      this.selectedCategory = category;

      this.$router.replace({ 
        name: "categories",
        params: {category: `${category.param}`}
      })
    },

    filterByKeyword(searchQuery) { 
      this.$router.replace({ 
        name: "search",
        query: {keyword: `${searchQuery}`} 
      });
    },

    async getData() {
      const result = await window.axios.get(url + this.$route.fullPath)
      const data = await result.data.data; 
      this.pageData = data;
    },

    handlePagination(){
      this.isLoading = true;
 
      const pageNumber =  `${this.currentPage++}`

      this.$router.push(`?page=${pageNumber}`);
    },
  },
  
  computed: {
    showButtons() {
      return this.$route.name !== 'apiKey'
    },
  },

  watch: {
    $route() {
      this.isLoading = true;
      this.getData().then(() =>  this.setLastPage());
    }
  }
};
</script>

<style>
  .btn.disabled, .btn:disabled, .btn:not(:disabled):not(.disabled).active, .btn:not(:disabled):not(.disabled):active {
    box-shadow: 0 4px 6px rgb(30 31 57 / 11%), 0 1px 3px rgb(0 0 0 / 8%) !important;
  }
</style>

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
        :translations="this.$attrs.translations"
        @handleSelect="filterByCategory"
        @handleSearch="filterByKeyword"
      ></SearchBar>
        <router-view 
            v-show="!isLoading" 
            :modules="pageData"
            :isInstalled="isInstalled"
            :installed= "installed"
            :translations="this.$attrs.translations"
          ></router-view>
          <router-view 
            name="paginationHelper"
            v-show="!isLoading" 
            :last_page="last_page" 
            :translations="this.$attrs.translations"
            @handlePagination="handlePagination"
          ></router-view>
      <notifications></notifications>
     <Footer></Footer>
  </div>
  </keep-alive>
</template>

<script>

import Header from './views/apps/components/Header.vue';
import SearchBar from './views/apps/components/SearchBar.vue';
import Footer from './views/apps/components/Footer.vue';
import Spinner from './views/apps/components/Spinner.vue';
import Global from './mixins/global';

export default {
  name: "Apps",

  components: { 
    Footer,
    Header, 
    SearchBar,
    Spinner
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

  mounted() {
    window.axios.get(this.path + '/apps/my').then(res => {
        this.installed = res.data.data.installed;
        this.isInstalled = Object.keys(res.data.data.installed);
    }); 
    this.getData();  
  },

  methods: {
    setLastPage() {
      this.pageData.modules.last_page 
        ? this.last_page = this.pageData.modules.last_page 
        : this.last_page = 0;
       this.currentPage = this.pageData.modules.current_page;
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
      const result = await window.axios.get(this.path + this.$route.fullPath)
      const data = await result.data.data;   
      this.pageData = data;
    },

    handlePagination(x){
      const pageNumber =  `${this.currentPage++}`

      this.$router.push(`?page=${pageNumber}`);
    },
  },
  
  computed: {
    showButtons() {
      return this.$route.name !== 'apiKey'
    },
    path() {
      const baseURL = new URL(url).protocol + '//' + window.location.host;
      const companyPath = url.replace(baseURL, '' );
      const path = baseURL + companyPath;

      return path;
    },
    translations() {
      return this.$attrs.module_translations
    },
     categories() {
      return this.$attrs.app_categories
    },

  },

  watch: {
    $route() {
      this.getData().then(() =>  this.setLastPage())
    }
  }
};
</script>

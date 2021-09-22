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
            @on-submit="handleSubmit"
          ></router-view>
        <div>
            <spinner class="text-center " v-show="isLoading"></spinner>
        </div>
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
      isLoading: true,
      installed: [],
      isInstalled: [],
      isDisabled: false,
      formError: "",
      selectedCategory: "",
      last_page: 0,
      pageData: {},
    };
  },

  async mounted() {
    window.axios.get(this.path + '/apps/my').then(res => {
        this.installed = res.data.data.installed;
        this.isInstalled = Object.keys(res.data.data.installed);
    }); 
    this.getData();  
    this.isLoading = false;
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

    handleSubmit(data) {
      this.$emit('onSubmit', data);

      this.isLoading = true;

      window.axios({
                method: "POST",
                url: this.path + "/apps/api-key",
                data: data,
                headers: {
                    "X-CSRF-TOKEN": window.Laravel.csrfToken,
                    "X-Requested-With": "XMLHttpRequest",
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((response) => {
                this.onSuccess(response);
            })
            .catch((error) => {
              this.onFail(error);
            });
    },

    onSuccess(response) {
        this.errors = {};
      
        this.isLoading = false;

        if (response.data.redirect) {
            this.isLoading = true;

            window.location.href = response.data.redirect;
        }

        this.response = response.data;
    },

    onFail(error) {
         this.errors = error.response.data.errors;

         this.isLoading = false;
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

<style>
  .btn.disabled, .btn:disabled, .btn:not(:disabled):not(.disabled).active, .btn:not(:disabled):not(.disabled):active {
    box-shadow: 0 4px 6px rgb(30 31 57 / 11%), 0 1px 3px rgb(0 0 0 / 8%) !important;
  }
</style>

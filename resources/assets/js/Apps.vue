<template>
  <div> 
    <Header 
      title="title"
      :showButtons="showButtons"
    ></Header>
      <SearchBar 
        v-show="this.$route.name !== 'apiKey'" 
        @handleSelect="filterByCategory"
        @handleSearch="filterByKeyword"
      ></SearchBar>

      <div>
          <router-view v-show="!isLoading" :modules="modules"></router-view>
          <router-view v-show="!isLoading" name="paginationHelper" @handlePagination="handlePagination"></router-view>
      </div>

     <Footer></Footer>
  </div>
</template>

<script>

import Header from './views/apps/components/Header.vue';
import SearchBar from './views/apps/components/SearchBar.vue';
import Footer from './views/apps/components/Footer.vue';
import Spinner from './views/apps/components/Spinner.vue';

export default {
  name: "Apps",

  components: { 
    Footer,
    Header, 
    SearchBar,
    Spinner
  },

  data() {
    return {
      isLoading: false,
      translations: {
      },
      formError: "Error occurred",
      selectedCategory: "",
      currentPage: 1,
      isLoaded: false,
      modules: {

      }
    };
  },

  created() {
    
  },

  async mounted() {
    this.currentPage = 1;
    this.isLoading = false;
    this.modules = await this.getModules();
  },

  methods: {
    async getModules(){
      const baseURL = new URL(url).protocol + '//' + window.location.host;
      const result = await window.axios.get(baseURL + '/1/apps/home');
      const data = await result.data.data;   

      return data;
    },
    filterByCategory(category) { 
      console.log(category.param)
      this.$router.replace({ 
        name: "categories",
        params: {category: `${category.param}`}
      });
    },

    filterByKeyword(searchQuery) { 
         //get filtered data

      //window.axios.get(url + '/modals/documents/item-columns/edit?type=' + type)
                 // .then(response => {
      //const res =  await axios.get(`https://app.akaunting.com/113091/apps/search?keyword=${query}`)
      //res.then(X => console.log(X))

      this.$router.replace({ 
        name: "search",
        query: {keyword: `${searchQuery}`} 
      });
      //filter
    },

    getData(pageNumber) {
   
       //axios.get(URL + pageNumber).then(getModules and setData);

       //isLoaded = true;
    },

    handlePagination(){
      const { fullPath, name } = this.$route;
      const pageNumber =  `${this.currentPage++}`

      //this.getData(URL + pageNumber).then(getModules and setData)

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
    }
  }
};
</script>

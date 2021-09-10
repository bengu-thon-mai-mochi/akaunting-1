<template>
  <div> 
    <Header 
      title="title"
      :showButtons="showButtons"
    ></Header>
      <SearchBar 
        v-show="this.$route.name !== 'apiKey'" 
        :values="categories"
        @handleSelect="filterByCategory"
        @handleSearch="filterByKeyword"
      ></SearchBar>

      <div>
          <router-view :data="$data"></router-view>
          <router-view name="paginationHelper" @handlePagination="handlePagination"></router-view>
      </div>

     <Footer></Footer>
  </div>
</template>

<script>

import Header from './views/apps/components/Header.vue';
import SearchBar from './views/apps/components/SearchBar.vue';
import Footer from './views/apps/components/Footer.vue';
import BaseInput from './components/Inputs/BaseInput';

import axios from 'axios';

export default {
  name: "Apps",

  components: { 
    Footer,
    Header, 
    SearchBar,
    BaseInput
  },

  data() {
    return {
      translations: {
      },
      categories: ['crm', 'bla', 'wow'],
      content: {
        headerButtons: ['Api Key', 'My App'],
        filterButtons: ['Top Paid', 'New', 'Top Free'],
        newApps: ['food', 'food', 'food', 'food', 'food', 'food', 'food'],
        paidApps: ['hummus','hummus','hummus','hummus','hummus','hummus' ],
        freeApps: ['free','free','free','free','free','free'],
        installedApps: ['miyav','miyav','miyav','miyav','miyav'],
        categories: ['cats','cats','cats','cats','cats','cats','cats'], 
      },
      modules: {
        free: [1,2,3,4,],
        paid: [2,3,4,5,],
      },
      formError: "Error occurred",
      selectedCategory: "",
      currentPage: 1,
      isLoaded: false,
    };
  },

  created() {
    getData();
  },

  mounted() {
    this.currentPage = 1;
  },

  methods: {
    filterByCategory(category) { 
      this.$router.replace({ 
        name: "categories",
        params: {category: `${category}`}
      });
    },

    filterByKeyword(searchQuery) { 
         //get filtered data

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
    }
  }
};
</script>

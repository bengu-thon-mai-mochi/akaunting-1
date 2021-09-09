<template>
  <div>
    <Header 
      title="title"
      :showButtons="showButtons"
    ></Header>
    <div class="container-fluid content-layout mt--6">
      <SearchBar 
        v-show="this.$route.name !== 'apiKey'" 
        :values="categories"
        @handleSelect="filterByCategory"
        @handleSearch="filterByKeyword(query)"
      ></SearchBar>

      <div class="col-xs-12 col-sm-12">
        <router-view :data="$data"></router-view>
      </div>

      <a @click="handlePagination"> 
        Next
      </a>

     <Footer v-show="this.$route.name !== 'apiKey'"></Footer>
    </div>
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
      query: "",
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
      return this.$router.push(`categories/${category}`)
    },

    filterByKeyword(query) { 
      this.query = query; 

         //get filteredArray

      //const res =  await axios.get(`https://app.akaunting.com/113091/apps/search?keyword=${query}`)
      //res.then(X => console.log(X))

      this.$router.push('search')
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

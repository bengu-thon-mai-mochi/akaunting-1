<template>
  <div>
    <div>
      <spinner class="text-center py-8" v-show="isLoading"></spinner>
    </div>
    <div v-show="!isLoading">
      <card-views-layout :title="translations.my.purchased" :translations="translations" :data="purchased"  :isInstalled="isInstalled"></card-views-layout>
      <card-views-layout :title="translations.my.installed" :translations="translations" :data="installed" :isInstalled="isInstalled"></card-views-layout>
    </div>
  </div>
</template>

<script>
import CardViewsLayout from './CardViewsLayout.vue';
import NoApp from './components/NoApp.vue';
import Spinner from './components/Spinner.vue';

export default {
  name: "MyApps",

  components: { NoApp, CardViewsLayout, Spinner },

  props: {
    isInstalled: {
      type: Array,
    },
    translations: {
      type: Object | Array
    },
  },

  data() {
    return { 
      installed: [],
      purchased: [],
      isLoading: true,
    }
  },

  async mounted() {
      const baseURL = new URL(url).protocol + '//' + window.location.host;
      const companyPath = url.replace(baseURL, '' );
      const path = baseURL + companyPath;
      
      await  window.axios.get(path + '/apps/my').then(res => {
        const { purchased, installed, modules } = res.data.data;

        installed === null ? 
          this.installed = null : 
          this.installed = this.filterArrayByAppName(modules, installed);
        
        purchased === null ? 
          this.purchased = null : 
          this.purchased = this.filterArrayByAppName(modules, purchased);
      }); 

      this.isLoading = false;
  },

  methods: {
    filterArrayByAppName(modules, namesOfModules) {
      const array = modules.filter(el => Object.keys(namesOfModules).includes(el.slug));

      return  array;
    }
  }
};
</script>

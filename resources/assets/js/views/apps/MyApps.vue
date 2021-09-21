<template>
  <div>
     <card-views-layout :translations="translations" :data="purchased"  :isInstalled="isInstalled"></card-views-layout>
     <card-views-layout :translations="translations" :data="installed" :isInstalled="isInstalled"></card-views-layout>
  </div>
</template>

<script>
import CardViewsLayout from './CardViewsLayout.vue';
import NoApp from './components/NoApp.vue';

export default {
  name: "MyApps",

  components: { NoApp, CardViewsLayout },

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
  },

  methods: {
    filterArrayByAppName(modules, namesOfModules) {
      const array = modules.filter(el => Object.keys(namesOfModules).includes(el.slug));

      return  array;
    }
  }
};
</script>

<template>
  <div v-if="pageData.modules"> 
    
    <div 
      v-for="(modules, index) in pageData.modules" 
      :key="index"
    >
      
      <h2>Modul Tip Adı</h2>

      <div class="row">
        <div v-for="(module, index) in modules" class="col-md-3">
          <AppCard 
            appLink="_target" 
            cardHeader="App Adı" 
            imgSource="https://ae01.alicdn.com/kf/Hb25ef13ee50340e1aea27dff7be17fa35/Atlama-zaman-13cm-x-11-8cm-Hello-Kitty-sevimli-eytan-eytan-boynuzlar-Sticker-diz-st-kartmas.jpg_Q90.jpg_.web">
          </AppCard>
        </div>
      </div>
    </div>
  </div>

  <div v-else> No Data </div>
</template>

<script>
import AppCard from './components/AppCard.vue'

export default {
  name: "Home",

  components: { AppCard },

  data() {
    return {
      pageData: {
      },
    };
  },

  created() {
    this.pageData = this.$attrs.data;
  },
};
</script>

<template>
  <div> 
    <div v-for="(module, index) in modules" :key="index">
      <h2>Top Paid</h2>
      <div class="row">
        <div 
          v-for="(app, index) in module.data" 
          class="col-md-3"
          :key="index"
        >
          <AppCard 
            :appLink="app.app_releases.data[0].item_slug"
            :cardHeader="app.name" 
            :imgSource="Object.values(app.files).flat()[0]['path_string']"
            :rating="app.vote"
            :price="app.price ? app.price : 'Free'"
            :discountPrice="app.special_price ? app.special_price : ''"
            :reviews="app.total_review"
          > 
          </AppCard>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AppCard from './components/AppCard.vue'

export default {
  name: "Home",

  components: { AppCard },

  props: {
    modules: {
      type: Object,
    },
  },
};
</script>

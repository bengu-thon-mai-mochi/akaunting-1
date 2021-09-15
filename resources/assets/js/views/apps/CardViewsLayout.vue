<template>
  <div> 
    <div>
      <h2> {{ title }} </h2>
      <div class="row">
        <div v-for="(module, index) in data.data" class="col-md-3">
          <AppCard 
            :appLink="module['app_releases'].data[0] ? module['app_releases'].data[0]['item_slug'] : '_target'" 
            :cardHeader="module.name" 
            :imgSource="Object.values(module.files).flat()[0]['path_string']"
            :rating="module.vote"
            :price="module.price"
            :discountPrice="module.special_price ? module.special_price : ''"
            :reviews="module.total_review"
          > 
          </AppCard>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AppCard from './components/AppCard.vue'

export default {
  name: "CardViewsLayout",

  components: { AppCard },

  props: {
    title: {
      type: String,
    },
    data: {
        type: Object,
    },
  },
};
</script>

<template>
  <div> 
    <div>
      <h2> {{ title }} </h2>
      <NoApp v-if="!data"></NoApp>
      <div class="row">
        <div v-for="(module, index) in data" class="col-md-3">
          <AppCard 
            :appLink="module['app_releases'].data[0] ? module['app_releases'].data[0]['item_slug'] : '_target'" 
            :cardHeader="module.name" 
            :imgSource="Object.values(module.files).flat()[0]['path_string']"
            :rating="module.vote ? module.vote : 5"
            :price="module.price ? module.price : translations.general.free"
            :discountPrice="module.special_price ? module.special_price : ''"
            :reviews="module.total_review"
            :isInstalled="isInstalled.includes(module.slug)"
          > 
          </AppCard>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AppCard from './components/AppCard.vue';
import NoApp from './components/NoApp.vue';

export default {
  name: "CardViewsLayout",

  components: { AppCard, NoApp },

  props: {
    title: {
      type: String,
    },
    data: {
      type: Array | Object,
    },
    isInstalled: {
      type: Array,
    },
    translations: {
      type: Object
    },
  },
};
</script>

<template>
  <div> 
    <div>
      <h2> {{ title }} </h2>
      <NoApp v-if="!data || data.length === 0" :translations="translations"></NoApp>
      <div v-else class="row">
        <div v-for="(module, index) in data" class="col-md-3">
          <AppCard 
            :appLink="module['slug']" 
            :cardHeader="module.name" 
            :imgSource="Object.values(module.files).flat()[0]['path_string']"
            :rating="module.vote"
            :price="module.price ? module.price : translations.general.free"
            :discountPrice="module.special_price ? module.special_price : ''"
            :reviews="module.total_review"
            :isInstalled="isInstalled.includes(module.slug)"
            :translations="translations"
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
      default: ''
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

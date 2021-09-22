<template>
    <card-views-layout :translations="translations" :data="modules.modules" :isInstalled="isInstalled" :title="modules.title"></card-views-layout>
</template>

<script>
import CardViewsLayout from './CardViewsLayout.vue';
export default {
  components: { CardViewsLayout },
  name: "Search",

  props: {
    modules: {
      type: Object | Array ,
      default:[],
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

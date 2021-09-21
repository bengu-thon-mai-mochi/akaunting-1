<template>
  <keep-alive>
    <card-views-layout :translations="translations" :data="modules.modules.data" :isInstalled="isInstalled" :title="modules.title"></card-views-layout>
  </keep-alive>
</template>

<script>
import CardViewsLayout from './CardViewsLayout.vue';
export default {
  components: { CardViewsLayout },
  name: "Vendors",

  props: {
    modules: {
      type: Object | Array
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

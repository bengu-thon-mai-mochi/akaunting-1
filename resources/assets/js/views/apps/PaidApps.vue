<template>
  <keep-alive>
    <card-views-layout :translations="translations" :data="modules.modules ? modules.modules.data : []" :title="modules.title" :isInstalled="isInstalled"></card-views-layout>
  </keep-alive>
</template>

<script>
import CardViewsLayout from './CardViewsLayout.vue';
export default {
  components: { CardViewsLayout },
  name: "PaidApps",

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

<template>
    <card-views-layout :translations="translations" :data="modules.modules.data" :title="modules.title" :isInstalled="isInstalled"></card-views-layout>
</template>

<script>
import CardViewsLayout from './CardViewsLayout.vue';
export default {
  components: { CardViewsLayout },
  name: "NewApps",

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

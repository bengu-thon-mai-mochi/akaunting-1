<template>
    <card-views-layout :translations="translations" :data="modules.modules.data" :isInstalled="isInstalled" :title="modules.title"></card-views-layout>
</template>

<script>
import CardViewsLayout from './CardViewsLayout.vue';
export default {
  components: { CardViewsLayout },
  name: "FreeApps",

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

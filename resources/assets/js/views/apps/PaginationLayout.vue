<template>
  <div class="row" v-if="last_page > 0">
    <div class="col-md-6 text-left">
      <router-link v-if="this.$route.query.page > 1" 
        :to="`${this.$route.path}?page=${Number(this.$route.query.page) - 1}`" 
        class="btn btn-white btn-sm"
      > 
        {{ translations.actions.previous }}
      </router-link>
    </div>
    <div class="col-md-12 text-right">
      <router-link v-if="this.$route.query.page ? this.$route.query.page < last_page : last_page !== 1"
        :to="`${this.$route.path}?page=${this.$route.query.page ? Number(this.$route.query.page) + 1 : 2}`" 
        class="btn btn-white btn-sm"> 
        {{ translations.actions.next }}
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
    name: 'PaginationLayout',

    props: {
      last_page: {
        type: Number | String,
        default: 0
      },

    translations: {
      type: Object
    },
  },
}
</script>

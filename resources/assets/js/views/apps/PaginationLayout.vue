<template>
  <div class="row">
    <div class="col-md-6 text-left">
      <router-link 
        v-if="this.$route.query.page > 1"
        :to="`${this.$route.name}?page=${Number(this.$route.query.page) - 1}`" 
        class="btn btn-white btn-sm"
      > 
        Back
      </router-link>
    </div>
    <div class="col-md-12 text-right">
      <router-link
        v-if="last_page - 1 != this.$route.query.page"
        :to="`${this.$route.name}?page=${this.$route.query.page ? Number(this.$route.query.page) + 1 : 2}`" 
        class="btn btn-white btn-sm"
      > 
        Next
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
        default: 1
      },
    }
}
</script>

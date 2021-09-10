<template>
    <div>
      <a @click="handlePagination"> 
        Next
      </a>
    </div>
</template>

<script>
export default {
    data () {
      return {}
    },

    methods: {
      handlePagination(){
        this.$emit('handlePagination', 'next');
      },
    }
}
</script>

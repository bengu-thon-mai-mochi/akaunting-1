<template>
  <div v-if="pageData.modules"> 
    
    <div 
      class="card"
      v-for="(modules, index) in pageData.modules" 
      :key="index"
    >
      
      <h2>Modul Tip Adı</h2>

      <div class="row">
        <div v-for="(module, index) in modules" class="col-md-3">
          <div class="card">
            <div class="card-header py-2">
              <h4 class="ml--3 mb-0 float-left">
               <a href="_target"> Modul Card Header </a>
              </h4>
            </div>

              <a href="_target">
                <img src="https://akaunting.com/public/assets/media/4-akaunting-inc/double-entry/double-entry-logo_1.png" alt="Double-Entry" class="card-img-top border-radius-none">
              </a>

              <div class="card-footer py-2">
                <div class="float-left ml--3 mt--1">
                  <i class="fa fa-star text-xs text-yellow"></i>
                    <small>(33)</small>
                </div> 
                <div class="float-right mr--3">
                  <small>
                    <strong>$69</strong>
                  </small>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div v-else> No Data </div>

</template>

<script>
export default {
  name: "Home",

  data() {
    return {
      pageData: {
      },
    };
  },

  created() {
    this.pageData = this.$attrs.data;
  },
};
</script>

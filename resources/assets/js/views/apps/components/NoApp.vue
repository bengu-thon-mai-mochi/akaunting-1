<template>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <p class="text-center">
               {{ translations.noApps.no_apps }}
              </p>
              <p class="text-center">
                <small v-html="translations.noApps.become_developer"></small>
              </p>
            </div>
          </div>
        </div>
      </div>
</template>


<script>
export default {
  name: "NoAppS",

  props: {
    translations: {
      type: Object
    },
  },

};
</script>
<template>
  <div>
    <div class="card row">
      <div class="card-body">
        <form method="POST" action="https://app.akaunting.com/113091/apps/api-key" accept-charset="UTF-8" id="form-app" role="form" enctype="multipart/form-data" class="form-loading-button">
          <input name="_token" type="hidden" value="xZYEv7ZyANRi7UZ4Ehfz47p3Ops7HSdf2SGyD2Ay" />
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-12 required">
                <label for="api_key" class="form-control-label">API Key</label>
                <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-key"></i>
                    </span>
                  </div>
                  <input
                    data-name="api_key"
                    data-value="fe6f1686-db66-402b-8068-ebc726cfe2d4"
                    placeholder="Enter API Key"
                    required="required"
                    name="api_key"
                    type="text"
                    value="fe6f1686-db66-402b-8068-ebc726cfe2d4"
                    id="api_key"
                    class="form-control"
                  />
                </div>

                <!---->
              </div>
              <div class="col-sm-12">
                <small><a href="https://akaunting.com/dashboard" target="_blank">Click here</a> to get your API key.</small>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row save-buttons">
              <div class="col-md-12">
                <a href="https://app.akaunting.com/113091/apps/home" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-icon btn-success">
                  <!---->
                  <span class="btn-inner--text">Save</span>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <Footer></Footer>
  </div>
</template>
<script>
import Footer from './components/Footer.vue'

export default {
  name: "ApiKey",

  components: { Footer },

  data() {
    return {
      translations: {
      },
    };
  },

  created() {
  },

};
</script>

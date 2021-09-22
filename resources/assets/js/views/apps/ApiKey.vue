<template>
    <div class="card">
      <div class="card-body">
        <form 
          @submit.prevent="onSubmit($event)"
          accept-charset="UTF-8" 
          id="form-app" 
          role="form" 
          ref="form"
          enctype="multipart/form-data" 
          class="form-loading-button">
          <input name="_token" type="hidden" value="xZYEv7ZyANRi7UZ4Ehfz47p3Ops7HSdf2SGyD2Ay" />
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-12 required">
                <label for="api_key" class="form-control-label">{{ translations.header.api_key }}</label>
                <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-key"></i>
                    </span>
                  </div>
                  <input
                    data-name="api_key"
                    v-model="inputValue"
                    :placeholder="translations.api_key.enter"
                    required="required"
                    name="api_key"
                    type="text"
                    id="api_key"
                    class="form-control"
                  />
                </div>

                <!---->
              </div>
              <div class="col-sm-12">
                <small v-html="translations.api_key.get_api_key"></small>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row save-buttons">
              <div class="col-md-12">
                <router-link to="/apps/home" exact class="btn btn-outline-secondary">{{ translations.actions.cancel }}</router-link>
                <button type="submit" class="btn btn-icon btn-success">
                  <!---->
                  <span class="btn-inner--text">{{ translations.actions.save }}</span>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</template>

<script>
import Footer from './components/Footer.vue';
import Global from '../../mixins/global';

export default {
  name: "ApiKey",

  components: { Footer },

  props: {
    translations: {
      type: Object
    },
  },

  mixins: [  
    Global 
  ],

  data() {
    return {
      inputValue: ""
    };
  },

  methods: {
    onSubmit() {
      const formData = new FormData(this.$refs["form"]);
      let data_name = {};

      for (let [key, val] of formData.entries()) {
        Object.assign(data_name, {
          [key]: val,
        });
      }
    /*
      Object.assign(data_name, {
          ["api_key"]: api_key,
          ["_token"]: window.Laravel.csrfToken,
      });
*/
     // formData.append(data_name["api_key"], data_name["_token"]);

      this.$emit('on-submit', formData)
    }
  },

  computed:  {
    path() {
      const baseURL = new URL(url).protocol + '//' + window.location.host;
      const companyPath = url.replace(baseURL, '' );
      const path = baseURL + companyPath;

      return path;
    }
  },

};
</script>

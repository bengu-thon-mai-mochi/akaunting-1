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
          <input name="_token" type="hidden" :value="this.token" />
          <div class="card-body">
            <div class="row">
              <div :class="`form-group col-sm-12 required ${formError ? 'has-error' : ''}`">
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
                    :placeholder="!api_key ? translations.api_key.enter : api_key"
                    required="required"
                    name="api_key"
                    type="text"
                    id="api_key"
                    class="form-control"
                    @input="clearInput"
                  />
                </div>
              <div v-if="formError" class="invalid-feedback d-block">Error: The API Key entered is invalid!</div>
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
    token: {
      type: String,
    },
    api_key: {
      type: String
    }
  },

  mixins: [  
    Global 
  ],

  data() {
    return {
      inputValue: `${api_key ?  api_key : ''}`,
      formError: "",
    };
  },

  methods: {
    clearInput() {
      this.formError = ""
    },

    onSubmit() {
      const formData = new FormData(this.$refs["form"]);
      let data_name = {};

      for (let [key, val] of formData.entries()) {
        Object.assign(data_name, {
          "api_key": val,
          ["_token"]: this.token,
        });
      } 

      window.axios({
                method: "POST",
                url: url + "/apps/api-key",
                data: formData,
                headers: {
                  "X-CSRF-TOKEN": this.$attrs.token,
                  "X-Requested-With": "XMLHttpRequest",
                  "Content-Type": "multipart/form-data",
                },
            })
            .then((response) => {
              this.onSuccess(response);
            })
            .catch((error) => {
              this.formError = error.response.data.errors;
            });
    },

    onSuccess(response) {
        this.Error = {};
      
        this.isLoading = false;

        if (response.data.redirect) {
            this.isLoading = true;

            window.location.href = response.data.redirect;
        }

        this.response = response.data;
    },
  },
};
</script>

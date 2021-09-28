<template>
    <div class="row justify-content-center apps-store-bar">
      <div class="col-xs-12 col-sm-12">
        <div class="card">
          <div class="card-body p-2">
            <div class="row align-items-center">
              <div class="col-xs-12 col-sm-2 pl-0 pr-0">
                <div class="form-group form-control-sm d-inline-block w-100">
                    <el-select
                      class="form-control-sm d-inline-block w-100"
                      name="values"
                      :options="values"
                      v-model="selected"
                      @change="handleSelect"
                      :placeholder="translations.searchBar.category_placeHolder"
                    >
                      <el-option
                          v-for="(category, index) in values"
                          :key="index"
                          :label="values[index]"
                          :value="values[index]"
                      >
                    </el-option>
                    </el-select>
                </div>
              <div>
            </div>
          </div>
          <div class="vr d-none d-sm-block"></div>
          <div class="col-xs-12 col-sm-6">
            <div class="searh-field tags-input__wrapper">
               <input
                    name="keyword"
                    @keydown.enter="handleEnter"
                    v-model="query"
                    @input="fetchResults"
                    :placeholder="translations.searchBar.search_placeholder"
                    >
                </input>
              </div>
            </div>
            <ul v-show="results">
                  <li v-for="result in results">
                    <a href="_target"> result.name </a> <button> Buy Now </button><button> Add to Cart </button>
                  </li>
            </ul>
                <div class="col-xs-12 col-sm-4 text-center">
                  <router-link to="/apps/paid" class="btn btn-white btn-sm" exact>{{ translations.general.top_paid }}</router-link>
                  <router-link to="/apps/new" class="btn btn-white btn-sm">{{ translations.general.new }}</router-link>
                  <router-link to="/apps/free" class="btn btn-white btn-sm">{{ translations.general.top_free }}</router-link>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import AkauntingSelect from '../../../components/AkauntingSelect.vue';
import { Select, Option, OptionGroup, Autocomplete } from "element-ui"

export default {
    name: 'SearchBar',

    components: { 
      [Select.name]: Select,
      [Option.name]: Option,
      [OptionGroup.name]: OptionGroup,
      [Autocomplete.name]: Autocomplete,
    },

    props: {
      values : {
        type: Object | Array,
      },
      translations: {
        type: Object | Array,
      },
    },

    data() {
      return {
        query: '',
        selected: '',
        results: [],
      }
    },

    methods: {
      handleSelect() {
        this.selected === "All Categories" 
          ? 
            this.$router.push('/apps/home') 
          
          :
            this.$emit('handleSelect',  { header:this.selected, param: this.selected.toLowerCase().replace(' ', '-') });

        this.query = '';
      },

      handleEnter(){
        this.$emit('handleSearch',this.query);
        this.selected = '';
      },

      fetchResults(){
        const endPoint = url + '/apps/search?keyword='+ this.query;
        
        window.axios.get(endPoint)
          .then(response => { 
            response.data.data.modules
            ? this.results = response.data.data.modules.data
            : this.results 
          })
          .then(() => console.log(this.results))
          .catch(error => {});
      },
    }
}
</script>


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
          <div class="col-xs-12 col-sm-7">
            <div class="searh-field tags-input__wrapper">
               <el-autocomplete
                    name="keyword"
                    class="col"
                    :trigger-on-focus="false" 
                    @select.native="handleEnter"
                    @keydown.enter="handleEnter"
                    :fetch-suggestions="fetchResults"
                    v-model="query"
                    value-key=""
                    popper-class="list-group-item list-group-item-active dropdown-menu-xl justify-content-start dropdown-menu-center show"
                    :placeholder="translations.searchBar.search_placeholder"
                    >
                     <template slot-scope="{ item }">
                        <div class="item d-flex justify-content-between align-items-center">
                            <router-link :to="item.slug" class="item dropdown-item col-6  d-flex justify-content-start align-items-center list-group-item-active">
                              <div class="mb-0" >
                                <img width="50px" :src="Object.values(item.logo).flat()[0]['path_string']"/>
                              </div>
                              <h5 class="col-sm-8 mb-0">{{ item.value }}</h5>
                              <h4 v-if="item.price" class="col-sm-6 mb-0 font-weight-600">{{ item.price }}</h4>
                            </router-link>
                            <div class="item d-flex col-6 justify-content-end align-items-center list-group-item-active">
                              <div v-if="!item.installedApps.includes(item.slug) && item.price">
                                <a class="col-sm-6 mb-0 btn btn-sm badge btn-success text-white" :href="item.action_url">{{ translations.actions.buy_now }} </a>
                                <button @click="addCart" class="btn btn-sm badge btn-warning text-white">Add to Cart</button> 
                              </div>
                              <div v-if="!item.price" class="col-6 align-items-center">
                                <h2 class="mb-0 col-sm-12">{{ translations.general.free }}</h2>
                              </div>
                            </div>
                        </div>
                      </template>
                </el-autocomplete>
              </div>
            </div>
                <div class="col-xs-12 col-sm-3 text-center">
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
        this.$emit('handleSearch', this.query);
        this.selected = '';
        this.query = '';
      },

      addCart(e){
        console.log(e)
      },

      async fetchResults(q, setDropdownData){
        const endPoint = url + '/apps/search?keyword='+ this.query;

        const result = await window.axios.get(endPoint).then(res => res);

        const installedApps = Object.keys(result.data.data.installed);
      
        result.data.data.modules.data ? 
          result.data.data.modules.data.forEach( res =>
             this.results.push({ "value": res.name , "slug": res.slug, "logo": res.files, "price": res.price, "link": res.action_url, "installedApps": installedApps, })
          )
          : this.results = [];
      
        setDropdownData(this.results);

        this.results = [];
      },
    }
}
</script>

<style>
.dropdown-item {
  flex-grow: 3;
}
</style>
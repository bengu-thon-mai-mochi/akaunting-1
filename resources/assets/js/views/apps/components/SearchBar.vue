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
                v-model="query" 
                type="text" 
                @keydown.enter="handleEnter"
                :placeholder="translations.searchBar.search_placeholder" 
                autocomplete="off" 
                class="form-control form-control-sm d-inline-block w-100"
              >
            </div>
                </div>
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
    </div>
</template>

<script>
import AkauntingSelect from '../../../components/AkauntingSelect.vue';
import { Select, Option, OptionGroup } from "element-ui"

export default {
    name: 'SearchBar',

    components: { 
      [Select.name]: Select,
      [Option.name]: Option,
      [OptionGroup.name]: OptionGroup,
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
      }
    }
}
</script>


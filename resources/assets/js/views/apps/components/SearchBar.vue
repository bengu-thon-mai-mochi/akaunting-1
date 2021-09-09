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
                      @change="setSelectedCategory($event)"
                      placeholder="SELECT!!!"
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
                <form method="GET" action="https://app.akaunting.com/113091/apps/search" accept-charset="UTF-8" role="form" class="m-0">
                    <div class="searh-field tags-input__wrapper">
                        <input 
                          name="keyword" 
                          value="" 
                          type="text" 
                          @enter="filterByKeyword(e)"
                          placeholder="Type to search.." 
                          autocomplete="off" 
                          class="form-control form-control-sm d-inline-block w-100"
                        >
                    </div>
                </form>
              </div>

                <div class="col-xs-12 col-sm-4 text-center">
                    <router-link to="new" class="btn btn-white btn-sm">New</router-link>
                    <router-link to="free" class="btn btn-white btn-sm">Free Apps</router-link>
                    <router-link to="paid" class="btn btn-white btn-sm">Paid Apps</router-link>
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
      values: {
        type: Array,
      },
    },

    data() {
      return {
        selected: ""
      }
    },

    methods: {
      setSelectedCategory(e) {
        console.log(e)
        this.$emit('handleSelect', e)
      },
      filterByKeyword(e){
        this.$emit('handleSearch', e)
      }
    }
}
</script>

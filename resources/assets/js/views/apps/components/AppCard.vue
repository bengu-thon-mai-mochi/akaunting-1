<template>
        <div class="card">
            <div class="card-header py-2">
              <h4 class="ml--3 mb-0 float-left">
                <router-link :to="'/apps/' + appLink"> 
                    {{ cardHeader }} 
                </router-link>
              </h4>

              <span class="mr--3 float-right" v-if="isInstalled">
                  <span class="badge bg-green text-white">
                    {{ translations.general.installed }}
                  </span>
              </span>
            </div>

              <router-link :to="'/apps/' + appLink">
                <img 
                    :src="imgSource" 
                    :alt="cardHeader" 
                    class="card-img-top border-radius-none" 
                />
              </router-link>

              <div class="card-footer py-2">

                <div class="float-left ml--3 mt--1">
                  <rating :rating="rating"></rating>
                  <small>( {{ reviews }} )</small>
                </div> 
                <div class="float-right mr--3">
                  <small>
                    <strong v-if="discountPrice"> <del class="text-danger"> {{ price }} </del> {{ discountPrice }} </strong>
                    <strong v-else> {{ price }} </strong>
                  </small>
                </div>
              </div>
          </div>
        </div>
</template>

<script>
import Rating from './Rating.vue'
export default {
    name: 'AppCard',

    components: { Rating },

    props: { 
        appLink: {
            type: String,
            required: true
        },
        isInstalled: {
          type: Boolean,
          default: false,
        },
        cardHeader: {
            type: String,
            required: true
        },
        reviews: {
            type: Number,
            Default: 0
        },
        imgSource: {
            type: String,
            required: true
        },
        price:  {
            type: String,
        },
        discountPrice: {
            type: String,
        },
        rating: {
            type: Number
        },
        translations: {
          type: Object
        },
    },
}
</script>

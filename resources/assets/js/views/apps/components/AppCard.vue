<template>
        <div class="card">
            <div class="card-header py-2">
              <h4 class="ml--3 mb-0 float-left">
                <router-link :to="appLink"> 
                    {{ cardHeader }} 
                </router-link>
              </h4>
            </div>

              <a :href="appLink">
                <img 
                    :src="imgSource" 
                    :alt="cardHeader" 
                    class="card-img-top border-radius-none" 
                />
              </a>

              <div class="card-footer py-2">

                <div class="float-left ml--3 mt--1">
                  <i 
                    class="fa fa-star text-xs text-yellow"
                    v-for="(n, index) in rating"
                    :key="index"
                    >
                 </i>
                    <small>( {{ reviews }} )</small>
                </div> 
                <div class="float-right mr--3">
                  <small>
                    <strong> {{ price }} </strong>
                  </small>
                </div>
              </div>
          </div>
        </div>
</template>

<script>
export default {
    name: 'AppCard',

    props: { 
        appLink: {
            type: String,
            required: true
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
            Default: "$34"
        },
        discountPrice: {
            type: String,
            Default: "$34"
        },
        isDiscounted: {
            type: Boolean,
            Default: false
        },
        rating: {
            type: Number
        },
    }
}
</script>

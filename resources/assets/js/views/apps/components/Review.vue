 
<template>
<div class="media media-comment">
    <div class="media-body">
        <div class="media-comment-text">
             <div class="d-flex">
                 <h5 class="mb-0">{{ this.review.author }}</h5>
             </div>

            <div class="d-flex">
                <p class="h6 text-muted mb-0">{{ this.review.created_at }}</p>
            </div>

             <div class="d-flex">
                <span class="text-yellow position-absolute top-3 right-3">
                    <rating :rating="this.review.rating"></rating>
                </span>
            </div>

            <div class="d-flex">
                <p class="mt-2 mb-0 text-sm lh-160" v-html="this.review.text">
                </p>
            </div>
          </div>
        </div>
    </div>
</template> 

<script>
import Rating from './Rating.vue';

export default {
  components: { Rating },
    name: 'Review',

    props: {
        review: {
            type: Object,
            required: true,
        }
    },
}
</script>
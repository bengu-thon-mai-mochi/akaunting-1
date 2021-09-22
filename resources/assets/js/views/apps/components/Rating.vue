 
<template>
    <div>
        <i  
            v-show="rating"
            class="fa fa-star text-xs text-yellow"
            v-for="(n, index) in rating"
            :key="index"
        >
        </i>
        <i 
            v-show="!rating"
            class="far fa-star text-xs"
            v-for="(n, index) in 5"
            :key="index + 5"
        >
        </i>
    </div>
</template> 

<script>
export default {
    name: 'Rating',

    props: {
        rating: {
            type: Number,
            default: 0
        },
    }
}
</script>

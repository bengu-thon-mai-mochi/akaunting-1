 
<template>
    <div>
        <i 
            class="fa fa-star text-xs text-yellow"
            v-for="(n, index) in rating"
            :key="index"
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

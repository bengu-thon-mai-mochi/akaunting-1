<template>
    <li class="nav-item">
        <router-link 
            :to="routeDirection" 
            data-toggle="tab" 
            aria-selected="false" 
            :class="`nav-link mb-sm-2 mb-md-0 ${ isActive ? 'active' : '' }`"
        >
        {{ routeDirection }}
        </router-link>             
    </li>
</template>

<script>
export default {
    name: 'NavButtons',

    props: {
        routeDirection: {
            type: String,
            default: '#blank'
        },
        isActive: {
            type: Boolean,
            default: false
        },
    }
}
</script>

<template>
    <header>
        <div class="header">
            <div class="header-body">
                <div class="row py-4 align-items-center">
                    <div class="  col-sm-12 col-sm-8  col-md-7 align-items-center">
                        <h2 class="d-inline-flex mb-0 long-texts">
                            {{title}}
                        </h2>
                    </div>
                    <div v-if="showButtons" class="col-sm-12 col-sm-4 col-md-5">
                        <div class="text-right">
                            <router-link to="api-key/create" class="btn btn-white btn-sm">Api Key</router-link>
                            <router-link to="my" class="btn btn-white btn-sm">My Apps</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header',

    props: {
        title: {
            type: String,
            default: 'Title'
        },
        showButtons: {
            type: Boolean,
            default: true
        }
    }
}
</script>

<template>
    <h3>Actions</h3>
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <strong>
                    <div class="text-xl"> 
                        $69 
                    </div>
                </strong>
            </div>
        </div> 
        <div class="card-footer">
            <a :href="" target="_blank" class="btn btn-success btn-block">
                Buy Now
            </a> 
            <div class="text-center mt-3">
                {{ text }} 
                <a href="javascript:void();" id="button-purchase-faq">
                    {{ linkText }} 
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AboutCard',

    props: {
        text: {
            type: String,
            default: '#blank'
        },
        linkText: {
            type: String,
            default: false
        },
    }
}
</script>

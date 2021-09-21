<template>
    <footer class="footer">
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="text-sm float-left text-muted footer-texts">
              Powered By Akaunting: <a href="https://akaunting.com" target="_blank" class="text-muted">Free Accounting Software</a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="text-sm float-right text-muted footer-texts">
                Version 2.1.24
            </div>
          </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',

    props: {
      title: {
        type: String,
        default: 'Title'
      },
      translations: {
        type: Object
      },
    }
}
</script>

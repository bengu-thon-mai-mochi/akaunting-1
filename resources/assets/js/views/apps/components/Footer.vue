<template>
    <footer class="footer">
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="text-sm float-left text-muted footer-texts">
               {{ translations.footer.powered }}
                <a :href="translations.footer.link" target="_blank" class="text-muted">{{ translations.footer.software }}</a></a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="text-sm float-right text-muted footer-texts">
                {{ translations.footer.version }} 2.1.24
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

<template>
  <div>
    <header>
      <nav>
        <router-link to="api-key/create" class="btn btn-white btn-sm">Api Key</router-link>
        <router-link to="my" class="btn btn-white btn-sm">My Apps</router-link>
      </nav>
    </header>

    <div class="app-search">
      
      <nav>
        <router-link to="new" class="btn btn-white btn-sm">New</router-link>
        <router-link to="free" class="btn btn-white btn-sm">Free Apps</router-link>
        <router-link to="paid" class="btn btn-white btn-sm">Paid Apps</router-link>
      </nav>
    </div>

    <div>
      <router-view :data="$data"></router-view>
    </div>

    <footer></footer>
  </div>
</template>

<script>
export default {
  name: "Apps",

  data() {
    return {
      translations: {
      },
      content: {
        headerButtons: ['Api Key', 'My App'],
        filterButtons: ['Top Paid', 'New', 'Top Free'],
        newApps: ['food', 'food', 'food', 'food', 'food', 'food', 'food'],
        paidApps: ['hummus','hummus','hummus','hummus','hummus','hummus' ],
        freeApps: ['free','free','free','free','free','free'],
        installedApps: ['miyav','miyav','miyav','miyav','miyav'],
        categories: ['cats','cats','cats','cats','cats','cats','cats'], 
      },
      modules: {
        free: [1,2,3,4,],
        paid: [2,3,4,5,],
      }
    };
  },

  created() {
  },
};
</script>

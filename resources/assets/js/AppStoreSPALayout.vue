<template>
  <div>
    <header>
      <nav>
        <router-link to="api-key/create">Api Key</router-link>
        <router-link to="my">My Apps</router-link>
      </nav>
    </header>

    <div class="app-search">
      
      <nav>
        <router-link to="new">New</router-link>
        <router-link to="free">Free Apps</router-link>
        <router-link to="paid">Paid Apps</router-link>
      </nav>
    </div>

    <div>
      <router-view>
      </router-view>
    </div>

    <footer></footer>
  </div>
</template>

<script>
export default {
  name: "AppStoreSPALayout",

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
      }
    };
  },

  created() {
  },
};
</script>

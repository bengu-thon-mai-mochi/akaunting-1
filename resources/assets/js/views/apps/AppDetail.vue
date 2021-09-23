<template>
<div>
  <div v-if="isLoading">
      <spinner class="text-center py-8"></spinner>
  </div>  
  <div v-else>
    <akaunting-modal :show="showFaq" > 
      <template #modal-content>
        <div v-html="appData.purchase_faq"></div>
      </template>
    </akaunting-modal>
    <akaunting-modal :show="installation.show" @cancel="() => installation.show = false"> 
      <template #modal-header>
        <div>{{ translations.installation.header }}</div>
      </template>
      <template #modal-body>
        <div class="modal-body">
          <el-progress 
            :text-inside="true" 
            :stroke-width="24" 
            :percentage="installation.total" 
            :status="installation.status">
          </el-progress>
          <div id="progress-text" class="mt-3"></div>
          <div id="progress-text" class="mt-3" v-html="installation.html"></div>
        </div>
      </template>
      <template #card-footer>
        <div hidden></div>
      </template>
    </akaunting-modal>
    <div v-show="!isloading" class="row">
      <div class="col-md-8">
        <div class="row">
          <div class="col-xs-6 col-sm-6">
            <div class="float-left"><h3>{{ appData.name }}</h3></div>
          </div>
          <div class="col-xs-6 col-sm-6">
            <div class="float-right">
              <rating :rating="appData.vote"></rating>
            </div>
          </div>
        </div>
        <div class="nav-wrapper pt-0">
          <ul id="tabs-icons-text" role="tablist" class="nav nav-pills nav-fill flex-column flex-md-row">
            <li class="nav-item">
              <a href="#description" data-toggle="tab" aria-selected="false" class="nav-link mb-sm-2 mb-md-0 active">
                {{ this.$attrs.translations.detail.description }}
              </a>
            </li>
            <li class="nav-item">
              <a href="#review" data-toggle="tab" aria-selected="false" class="nav-link mb-sm-2 mb-md-0">    {{ this.$attrs.translations.detail.reviews }} ( {{ appData.total_review }} ) </a>
            </li>
          </ul>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="tab-content">
              <div id="description" class="tab-pane fade show active">
                <div v-html="appData.description"></div>
                <div v-if="appData.video">
                  <akaunting-carousel 
                      :name="appData.name" 
                      :video="appData.video.link" 
                      :screenshots="appData.screenshots"
                      height="430"
                      arrow="always"
                  >
                  </akaunting-carousel>
                </div>
                <div v-else-if="appData.screenshots">
                   <akaunting-carousel 
                      :name="appData.name" 
                      :screenshots="appData.screenshots"
                      height="430"
                      arrow="always"
                  >
                  </akaunting-carousel>
                </div>
              </div>
              <div id="review" class="tab-pane fade">
                <div id="reviews" class="clearfix">
                  <div 
                    id="review-items" 
                    v-if="pageReviews"
                  > 
                    <Review 
                      v-for="(review, index) in pageReviews"
                      :key="index"
                      :review="review">
                    </Review>
                  </div>
                  <div v-else> 
                    {{ translations.reviews.na }}
                  </div>
                  <pagination :paginationData="paginationData" @handle-update="handlePagination"></pagination>
                <div class="card-footer mx--4 mb--4">
                  <div class="row"><div class="col-md-12 text-right"></div></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="col-md-4">
        <h3>{{ translations.detail.actions }}</h3>
        <div class="card">
            <div class="card-body">
              <div class="text-center">
                <strong v-if="!discountPrice">
                  <div class="text-xl">
                    {{ appData.price === 0 ? translations.general.free : appData.price }}
                  </div>
                </strong>
                <strong v-else="discountPrice">
                  <div class="text-xl">
                    <del class="text-danger"> {{ appData.price }} </del>
                    <span> {{ discountPrice }} </span>
                  </div>
                </strong>
              </div>
            </div>
          <div class="card-footer">
            <div v-if="appState">
              <a :href="this.path + this.$route.path + '/uninstall'" class="btn btn-block btn-danger">
                  {{translations.actions.uninstall}}
              </a>
              <a v-show="installed[appData.slug]" :href="this.path + this.$route.path + '/disable'" class="btn btn-block btn-warning">
                 {{translations.actions.disable}}
              </a>
              <a v-show="!installed[appData.slug]" :href="this.path + this.$route.path + '/enable'" class="btn btn-success btn-block">
                {{translations.actions.enable}}
              </a>
            </div>
            <div v-if="!appState">
               <a v-show="appData.price" :href="appData.action_url" target="#" class="btn btn-success btn-block">
                {{translations.actions.buy_now}}
              </a>
              <button v-show="!appData.price" @click="onInstall" target="" class="btn btn-success btn-block">
                {{translations.actions.install}}
              </button>
            </div>
            <div class="text-center mt-3">
              A year of updates &amp; support.<br>A lifetime of usage. <a @click="onShowFaq" href="javascript:;">Learn more</a>
            </div>
          </div>
          </div>
            
        <h3>{{ translations.detail.about }}</h3>
        <div class="card">
          <table class="table">
            <tbody>
              <tr class="row">
                <th class="col-5">{{   translations.detail.developers }}</th>
                <td class="col-7 text-right">
                  <router-link :to="'vendors/' + appData.vendor.slug">
                    {{ appData.vendor.company }}
                  </router-link>
                </td>
              </tr>
              <tr class="row">
                <th class="col-5">{{  translations.detail.version }}</th>
                <td class="col-7 text-right"> {{ appData.version }} </td>
              </tr>
              <tr class="row">
                <th class="col-5">{{  translations.detail.added }}</th>
                <td class="col-7 text-right long-texts">{{ appData.published_at }}</td>
              </tr>
              <tr class="row">
                <th class="col-5">{{  translations.detail.updated }}</th>
                <td class="col-7 text-right">{{ appData.updated_at }}</td>
              </tr>
              <tr class="row">
                <th class="col-5"> {{  translations.detail.categories }} </th>
                <td class="col-7 text-right"><router-link :to="`/apps/categories/${appData.category.slug}`">{{ appData.category.name }}</router-link></td>
              </tr>
              <tr class="row">
                <th class="col-5">{{ translations.detail.documentation }}</th>
                <td v-if="appData.documentation" class="col-7 text-right">
                  <router-link :to="`/apps/docs/${appData.alias}`">{{ translations.detail.view }}</router-link>
                </td>
                <td v-else class="col-7 text-right">{{ translations.general.na }}</td>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
     </div>
  </div>
</div>
</template>

<script>
import NavButtons from './components/NavButtons.vue';
import Rating from './components/Rating.vue';
import AkauntingModal from '../../components/AkauntingModal.vue';
import Pagination from './components/Pagination.vue';
import Review from './components/Review.vue';
import AkauntingCarousel from '../../components/AkauntingCarousel.vue';
import { Progress } from 'element-ui';
import Spinner from './components/Spinner.vue';

export default {
  components: { 
    [Progress.name]: Progress,
    Rating, 
    NavButtons,
    AkauntingModal,
    Review,
    Pagination,
    AkauntingCarousel,
    Spinner
  },
  
  name: "AppDetail",
  
  props: {
    installed: {
      type: Object | Array
    },
    isInstalled: {
      type: Object | Array
    },
  },

  data() {
    return {
      isLoading: false,
      showFaq: false,
      actionsCompleted: true,
      appData: {},
      reviewPages: [],
      pageReviews: {},
      paginationData: {},
      discountPrice: '',
      installation: {
        show: false,
        steps: [],
        steps_total: 0,
        total: 0,
        path: '',
        alias: '',
        version: '',
        status: 'success',
        html: ''
      },
      translations: {},
    };
  },

  async mounted() {
    this.translations = this.$attrs.translations;
    const { appName } = this.$route.params;
    this.appData = await this.getPageData(appName);
    
    const { current_page, last_page, from, to, per_page, total, data } = this.appData.app_reviews;
    this.paginationData = { current_page, last_page, from, to, per_page, total };
    this.discountPrice = this.appData.special_price;
    this.pageReviews = data;
    this.isLoading=false;
  },

  methods: {
    onShowFaq() {
      this.showFaq = true;
    },

    async getPageData(param){
      this.actionsCompleted = false;
      const result = await window.axios.get( this.path + '/apps/' + param);
      const data = await result.data.data;   

      return data;
    },

    async getReviews(page){
      const result = await window.axios.post(this.path + '/apps/' + this.appData.slug  + '/reviews', {
              page: page
              }
            )
      const data = await result.data.data;   
      
      return data;
    },

    async handlePagination(page){ 
      const result = await this.getReviews(page);

      const { from, to, data } = result;
      this.pageReviews = data;
      this.paginationData = { ...this.paginationData, from, to };
    },
    
    onInstall() {
      this.actionsCompleted = false;
      this.installation.alias = this.appData.alias;
      this.installation.show = true;
      this.installation.total = 0;
      this.installation.path = this.appData.action_url;
      this.installation.version = this.appData.version;

      //initializeSteps
      this.updateStepsRecursively(this.path + '/apps/steps');
    },

    async updateStepsRecursively(path) {
      const name = this.appData.name;
      const alias= this.appData.alias;
      const version= this.appData.version;

     await axios.post(path, {
        name: name,
        alias: alias,
        version: version
      }).then(response => {
          if (response.data.error) {
            this.installation.status = 'exception';
            this.installation.html = '<div class="text-danger">' + response.data.message + '</div>';
          }
          // Set steps
          if (response.data.data) {
            this.installation.steps = response.data.data;
            this.installation.steps_total = this.installation.steps.length;

            this.next();
          }
      })
    },

    async next() {
        let data = this.installation.steps.shift();
        
        if (data) {
          this.installation.total = parseInt((100 - ((this.installation.steps.length / this.installation.steps_total) * 100)).toFixed(0));

          this.installation.html = '<span class="text-default"><i class="fa fa-spinner fa-spin update-spin"></i> ' + data['text'] + '</span> </br>';

          let step_promise = Promise.resolve(axios.post(data.url, {
              alias: this.appData.alias,
              version: this.appData.version,
              path: this.installation.path,
          }));

          step_promise.then(response => {
            if (response.data.error) {
               this.installation.status = 'exception';
               this.installation.html = '<div class="text-danger"><i class="fa fa-times update-error"></i> ' + response.data.message + '</div>';
            }

            if (response.data.success) {
                this.installation.status = 'success';
                this.appData.install = true;
            }

            if (response.data.data.path) {
                 this.installation.path = response.data.data.path;
            }

            if (!response.data.error && !response.data.redirect) {
                 setTimeout(function() {
                    this.next();
                        }.bind(this), 800);
            }

            if (response.data.redirect) {
                window.location = response.data.redirect;
            }
          }) .catch(error => {});
        }
    },
  },

  computed: {
    path() {
      const baseURL = new URL(url).protocol + '//' + window.location.host;
      const companyPath = url.replace(baseURL, '' );
      const path = baseURL + companyPath;

      return path;
    },

    appState() {
      return this.isInstalled.includes(this.appData.slug);
    },
  },
  
  watch: {
    isInstalled() {
      setTimeout(() => {
        this.actionsCompleted = true;
      }, 1000);
    }
  }
};
</script>

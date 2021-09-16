<template>
  <div>
    <akaunting-modal :show="show" @cancel="() => show = false"> 
      <template #modal-header>
        <div>Some heading</div>
      </template>
      <template #modal-body>
        <div v-html="appData.purchase_faq"></div>
      </template>
      <template #card-footer>
        <div hidden></div>
      </template>
    </akaunting-modal>
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <div class="col-xs-6 col-sm-6">
            <div class="float-left"><h3>{{appData.name}}</h3></div>
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
                Description
              </a>
            </li>
            <li class="nav-item">
              <a href="#review" data-toggle="tab" aria-selected="false" class="nav-link mb-sm-2 mb-md-0">  Reviews ( {{ appData.total_review }} ) </a>
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
                <div id="reviews" class="clearfix" keep-alive>
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
        <h3>Actions</h3>
        <div class="card">
            <div class="card-body">
              <div class="text-center">
                <strong v-if="!discountPrice">
                  <div class="text-center mt-3">
                    {{ appData.price }}
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
            <a :href="appData.action_url" class="btn btn-success btn-block">
              Buy Now
            </a>
            <div class="text-center mt-3" v-html="appData.purchase_desc">
            </div>
          </div>
          </div>
            
        <h3>About</h3>
        <div class="card">
          <table class="table">
            <tbody>
              <tr class="row">
                <th class="col-5">Developer</th>
                <td class="col-7 text-right">
                  <router-link :to="'vendors/' + appData.vendor.slug">
                    {{ appData.vendor.company }}
                  </router-link>
                </td>
              </tr>
              <tr class="row">
                <th class="col-5">Version</th>
                <td class="col-7 text-right"> {{ appData.version }} </td>
              </tr>
              <tr class="row">
                <th class="col-5">Added</th>
                <td class="col-7 text-right long-texts">{{ appData.published_at }}</td>
              </tr>
              <tr class="row">
                <th class="col-5">Updated</th>
                <td class="col-7 text-right">{{ appData.updated_at }}</td>
              </tr>
              <tr class="row">
                <th class="col-5">Category</th>
                <td class="col-7 text-right"><router-link :to="`/apps/categories/${appData.category.slug}`">{{ appData.category.name }}</router-link></td>
              </tr>
              <tr class="row">
                <th class="col-5">Documentation</th>
                <td class="col-7 text-right">
                  <router-link :to="`/apps/docs/${appData.alias}`">View</router-link>
                </td>
              </tr>
            </tbody>
          </table>
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

export default {
  components: { 
    Rating, 
    NavButtons,
    AkauntingModal,
    Review,
    Pagination,
    AkauntingCarousel
  },
  
  name: "AppDetail",

  data() {
    return {
      show: false,
      appData: {},
      reviewPages: [],
      pageReviews: {},
      paginationData: {},
      discountPrice: ''
    };
  },

  async mounted() {
    const { appName } = this.$route.params;
    this.appData = await this.getPageData(appName);
    
    const { current_page, last_page, from, to, per_page, total, data } = this.appData.app_reviews;
    this.paginationData = { current_page, last_page, from, to, per_page, total };
    this.discountPrice = this.appData.special_price;
    this.pageReviews = data;
  },

  methods: {
    onShowFaq() {
      this.show = true;
    },
    async getPageData(param){
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
    }
  },

  computed: {
    path() {
      const baseURL = new URL(url).protocol + '//' + window.location.host;
      const companyPath = url.replace(baseURL, '' );
      const path = baseURL + companyPath;

      return path;
    },
  }
};
</script>

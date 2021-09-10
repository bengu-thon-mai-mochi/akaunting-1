 <template>
   <div class="row mt-4">
    <div class="col-md-6">
        <span class="table-text d-lg-block">
            {(reviews / 5) . currentPage chunk}  of {reviews} records.
        </span>
   </div>

    <ul v-if="pages" class="pagination float-right">
        <li 
            :class="`page-item  ${currentPage === 1 ? isDisabled : ''}` "
        >
            <button 
                type="button" 
                class="page-link"
                @click="navigateToSelectedPage(currentPage - 1)"
            >
                <
            </button>
        </li>
        <li 
            v-for="(value, index) in pages"
            :key="index"
            :class="`page-item ${currentPage === value ? isSelected : ''}`"
        >
            <button 
                type="button" 
                class="page-link"
                @click="navigateToSelectedPage(value)"
            >
                {{value}}
            </button>
        </li>
        <li 
            :class="`page-item  ${currentPage === pages.length ? isDisabled : ''}` "
        >
            <button 
                type="button" 
                class="page-link"
                @click="navigateToSelectedPage(currentPage + 1)"
            >
                >
            </button>
        </li>
    </ul>
   </div>
</template> 

<script>
export default {
    name: 'Pagination',

    props: {
        pages: {
            type: Array,
            default: [1,2,3,4,5,6,7,8,9]
        },
    },

    data() {
        return {
            currentPage: 1,
        }
    },

    methods: {
        navigateToSelectedPage(page) {
            this.currentPage = page;
            //change view
        },
    },

    computed: {
        isActive() {
            return 'active';
        },
        isDisabled() {
            return 'disabled';
        }, 
        isActive() {
            return 'active';
        },
        isSelected() {
            return 'active disabled';
        },
        
    }
}
</script>

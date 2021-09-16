 <template>
   <div class="row mt-4">
    <div class="col-md-6">
        <span class="table-text d-lg-block">
            {{paginationData.from}}/{{ paginationData.to }} of {{ paginationData.total}} records.
        </span>
   </div>
    <div class="col-md-6">
    <ul v-if="paginationData.last_page" class="pagination float-right">
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
            v-for="(value, index) in paginationData.last_page"
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
            :class="`page-item  ${currentPage === paginationData.last_page ? isDisabled : ''}` "
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
   </div>
</template> 

<script>
export default {
    name: 'Pagination',

    props: {
        paginationData: {
            type: Object
        }
    },

    data() {
        return {
            currentPage: 1,
        }
    },

    methods: {
        navigateToSelectedPage(page) {
            this.$emit('handle-update', page);
            this.currentPage = page;
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
        
    },
}
</script>

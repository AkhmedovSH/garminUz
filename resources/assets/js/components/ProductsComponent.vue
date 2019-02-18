<template>
<div class="app-products">
    <div class="app-products_filter flex-column-nowrap align-center" id="app-products_filter">
        <p class="app-products_filter_name_style">Фильтровать по серии</p>
        <ul class="list-style-default ma-0 pa-0">
            <li v-for="(serie, index) in series" :key="serie.id">
                <div @click.prevent="sortBySeries(index,serie.id)" class="filter_name" id="filter_name-1" :data-id='serie.id'>
                <span v-if="serie.filter_type == 1">
                    <input type="checkbox" class="switch_1">
                    <label class="filter_name-custom-label" @click.prevent="filterStyles()" v-bind:class="{ active: isActive }">
                        <span id="agree" class="filter_name-custom-checkbox-notchecked">
                            <svg class="app__products__filters__radio__check" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 100 100" width="15px">
                                <path d="M70.1 35.9L40 64.1 29.9 54"></path>
                            </svg>
                        </span>
                        <span class="filter-text"><a>{{ serie.title }}</a></span>
                        <span class="filter-text">({{ serie.filter_products_count }})</span>
                    </label>
                </span>
                </div>
            </li>
        </ul>
        <hr>
        <p class="app-products_filter_name_style">Фильтровать по функциям</p>
        <ul class="list-style-default ma-0 pa-0">
            <li v-for="(serie, index) in features" :key="serie.id">
                <div @click.prevent="sortBySeries(index,serie.id,this.right_sort)" class="filter_name" id="filter_name-1">
                <span v-if="serie.filter_type == 0">
                    <input type="checkbox" class="switch_1">
                    <label id="label" class="filter_name-custom-label">
                        <span id="agree" class="filter_name-custom-checkbox-notchecked">
                            <svg class="app__products__filters__radio__check" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 100 100" width="15px">
                                <path d="M70.1 35.9L40 64.1 29.9 54"></path>
                            </svg>
                        </span>
                        <span class="filter-text"><a>{{ serie.title }}</a></span>
                        <span class="filter-text">({{ serie.filter_products_count }})</span>
                    </label>
                </span>
                </div>
            </li>
        </ul>
    </div>
    <div class="app-products_products">
        <div class="app-products_products-filters">
            <div class="grid_or_list">
                <a href="#" id="grid" class="on"><i class="fa fa-th"></i></a>
                <a href="#" id="list"><i class="fa fa-bars"></i></a>
            </div>
            <div class="buttonCollapse_mobile">
                <button class="filter-Collapse-button" type="button" data-toggle="collapse" data-target="#app-products_filter" >Filters</button>
            </div>
            <div class="select-filter">
                <span class="sort_title"> Сортировка</span>
                <form @change.prevent="sortBySelect" ref="form">
                <select v-model="sortOption" name="sortOption" class="sg-select__element">
                    <option selected  value="0">Избранные продукты</option>
                    <option  value="1">От А до Я</option>
                    <option  value="2">От Я до А</option>
                    <option  value="3">Цена: По убыванию</option>
                    <option  value="4">Цена: По возрастанию</option>
                </select>
            </form>
            </div>
        </div>
        <div class="app-products_products-all" id="product">
            <a :href="'/product/' + product.slug" class="app-product grid-style" v-for="product in filteredTasks" :key="product.id">
                <div class="new-stick">
                    <p class="new-stick-position" v-if="product.new == 1">
                        <span class="new-stick-style">
                            Новое
                        </span>
                    </p>
                    <p class="new-stick-position" v-if="product.sale != null">
                        <span class="new-stick-style">
                            Скидка
                        </span>
                    </p>
                </div>
                <div class="app-products_products-all_image">
                    <img :src="'/uploads/products/' + product.image" alt="">
                </div>
                <div class="app-products_products-all_text">
                    <div class="app-products_products-all_heading">
                        <p>{{ product.title }}</p>
                    </div>
                    <div class="app-products_products-all_description">
                        <p>{{ product.description }}</p>
                    </div>
                </div>


                <div class="app-products_products-all_price" v-if="product.price != null">
                    {{ formatPrice(product.price * dollar)  }}
                    <sup>Сум</sup>
                    <span class="and_up">и ВЫШЕ</span>
                </div>
                <div class="app-products_products-all_price" v-if="product.price == null && product.app_store_url == null && product.google_play_url == null">
                    <p>Не опубликовано</p>
                </div>
                <div class="app-products_products-all_price" v-if="product.app_store_url != null || product.google_play_url != null">
                    <p class="market_href">
                        <a :href="product.app_store_url" v-if="product.app_store_url != null">
                            <img src="https://static.garmincdn.com/en/products/010-000GT-AP/g/ic-app-store.gif" title="Available on the App Store">
                        </a>
                        <a :href="product.google_play_url" v-if="product.google_play_url != null">
                            <img src="https://static.garmincdn.com/en/icons/google-play-small.png" title="Android App on Google Play">
                        </a>
                    </p>
                </div>

            </a>
        </div>
        <div class="product-page_pagination">
            <pagination :data="products" @pagination-change-page="getResults"></pagination>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props:['category_id','dollar'],
        data(){
            return {
                products: {},
                series: {},
                features: {},
                sortOption: 0,
                sortBy: null, // правая сортировка select
                sortBy_value: null, // правая сортировка select
                filters_ids: null,
                filter_rows: [],
                //filter_row: [], // для проверки 2 рого клика на один и тотже фильтр
                filtered: [], // для проверки 2 рого клика на один и тотже фильтр
                isActive: false
            }
        },
         methods: {
             sortBySelect(){
                  if(this.sortOption == 0){
                         this.sortBy = 'featured'
                         this.sortBy_value = 'desc'
                     }if(this.sortOption == 1){
                          this.sortBy = 'title'
                         this.sortBy_value = 'asc'
                     }if(this.sortOption == 2){
                          this.sortBy = 'title'
                         this.sortBy_value = 'desc'
                     }if(this.sortOption == 3){
                          this.sortBy = 'price'
                         this.sortBy_value = 'desc'
                     }if(this.sortOption == 4){
                          this.sortBy = 'price'
                         this.sortBy_value = 'asc'
                     }
                 if(this.filter_rows.length > 0){
                    this.sortBySeries();
                 }else{
                    axios.get('/products', {params:{category_id: this.category_id,
                                             sortBy:this.sortBy,
                                             sortBy_value:this.sortBy_value
                                             }}).then(res =>{
                    this.series = res.data.series
                    this.features = res.data.features
                    this.products = res.data.products
                    }).catch(err=>console.log(err))
                 }
             },
             sortBySeries(index,filters_ids){
               const selectedRow = this.filter_rows.find(row => row.filters_ids === filters_ids)
               if (this.filter_rows.length > 0 && selectedRow) {
                    const filterIndex = this.filter_rows.indexOf(selectedRow)
                    this.filter_rows.splice(filterIndex, 1)
               } else {
                   this.filter_rows.push({ filters_ids })
               }      
                axios.get("/products",{params: { 
                     filters: this.filter_rows,
                     category_id: this.category_id,
                     sortBy:this.sortBy,
                     sortBy_value:this.sortBy_value
                     }})
                .then(res => {
                    this.products = res.data.products
                })
                .catch(err=>console.log(err));
             },
            getCategories() {
               
                axios.get('/products', {params:{category_id: this.category_id}}).then(res =>{
                    this.series = res.data.series
                    this.features = res.data.features
                    this.products = res.data.products
                   
                }).catch(err=>console.log(err))
            },
            getResults(page = 1) {
			axios.get('/products?page=' + page,{params:{category_id: this.category_id}})
				.then(res => {
					this.products = res.data.products;
				});
            },
            filterStyles(){
                this.isActive = !this.isActive;
            },
            formatPrice(value) {
                let val = (value/1).toFixed(0).replace('.', ',')

                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            }
            
         },  
         computed: {
            filteredTasks () {
                return this.products.data;
            }
         },
        created(){
            this.getCategories();
        },
        mounted() {
		// Fetch initial results
        this.getResults();
	    },
    }
</script>

<style scoped>
.select-filter {
    display: flex;
}
.sort_title{
    padding-right: 5px;
}
</style>
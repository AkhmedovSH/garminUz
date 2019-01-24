<template>
       <div>
           <div class="col-md-12">
               <ul class="list">
                   <h3>Series</h3>
                   <li v-for="(serie, index) in series" :key="serie.id">
                        <span @click.prevent="sortBySeries(index,serie.id)">
                            <span v-if="serie.filter_type == 1">
                                {{ serie.title }} / {{ serie.filter_products_count }}
                            </span>
                        </span>
                   </li>
               </ul>
               <ul class="list">
                   <h3>Features</h3>
                   <li v-for="(serie, index) in features" :key="serie.id">
                        <span @click.prevent="sortBySeries(index,serie.id,this.right_sort)">
                            <span v-if="serie.filter_type == 0">
                                {{ serie.title }} / {{ serie.filter_products_count }}
                            </span>
                        </span>
                   </li>
               </ul>
           </div>
           <div class="col-md-12">
               <ul>
                   <li v-for="product in filteredTasks" :key="product.id">
                        <span>
                             <a :href="'/product/' + product.slug">
                                 {{ product.title }}
                            </a>
                        </span>
                   </li>
               </ul>
           </div>
            <form @change.prevent="sortBySelect" ref="form">
                <select v-model="sortOption" name="sortOption" class="sg-select__element">
                    <option selected  value="0">Избранные продукты</option>
                    <option  value="1">От А до Я</option>
                    <option  value="2">От Я до А</option>
                    <option  value="3">Цена: По убыванию</option>
                    <option  value="4">Цена: По возрастанию</option>
                </select>
            </form>
           <pagination :data="products" @pagination-change-page="getResults"></pagination>
       </div>
</template>

<script>
    export default {
        props:['category_id'],
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
                filter_row: [], // для проверки 2 рого клика на один и тотже фильтр
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
                     }console.log(this.sortBy)
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
                this.filter_row =  this.filter_rows.filter(function(query) {
                    return query.filters_ids == filters_ids;
                });
                if(this.filter_row.length > 0){
                    this.filter_rows.splice(this.filter_rows.indexOf(index), 1);
                }else{
                    if(filters_ids != null){
                        this.filter_rows.push({filters_ids});
                    }
                      
                }
                 console.log(index)
                console.log(this.filter_rows) 
                axios.get("/products",{params: { 
                     filters: this.filter_rows,
                     category_id: this.category_id,
                     sortBy:this.sortBy,
                     sortBy_value:this.sortBy_value
                     }})
                .then(res => {
                    console.log(res)
                    this.products = res.data.products
                })
                .catch(err=>console.log(err));
             },
            getCategories() {
               
                axios.get('/products', {params:{category_id: this.category_id}}).then(res =>{
                     console.log(res.data.features)
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
.list{
    display: flex;
    justify-content: space-around
}
</style>
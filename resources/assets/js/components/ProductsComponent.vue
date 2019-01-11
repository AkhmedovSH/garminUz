<template>
       <div>
           <div class="col-md-12">
               <ul class="list">
                   <li v-for="(serie, index) in series" :key="serie.id">
                            <span @click.prevent="sortBySeries(index,serie.id)">
                                <h6 v-if="serie.filter_type == 1">
                                    {{ serie.title }} / {{ serie.filter_products_count }}
                                </h6>
                                
                                 <h3 v-if="serie.filter_type == 0">
                                     {{ serie.title }} / {{ serie.filter_products_count }}
                                 </h3>
                                  
                        </span>
                   </li>
               </ul>
           </div>
           <div class="col-md-12">
               <ul>
                   <li v-for="product in products" :key="product.id">
                        <span>
                            {{ product.title }}
                        </span>
                   </li>
               </ul>
           </div>
           
       </div>
</template>

<script>
    export default {
        props:['category_id'],
        data(){
            return {
                products: {},
                series: {},
                orderBy: null,
                filter_rows: [],
                filter_row: [],

            }
        },
         methods: {
             sortBySeries(index,filters_ids){
                //console.log(filters_ids)
                //console.log(index)
                this.filter_row =  this.filter_rows.filter(function(query) {
                    return query.filters_ids == filters_ids;
                });
                if(this.filter_row.length > 0){
                     this.filter_rows.splice(this.filter_rows.indexOf(index), 1);
                     
                     //this.$delete(this.filter_rows, this.filter_rows.filters_ids)
                     this.filter_row.splice(this.filter_row.filters_ids);
                }else{
                      this.filter_rows.push({filters_ids});
                }
                

                axios.post("/products/filter", { filters: this.filter_rows, category_id: this.category_id })
                .then(res => {
                    this.products = res.data.products
                })
                .catch(err=>console.log(err)); 
             },
            getCategories() {
                axios.post('/products', {category_id: this.category_id}).then(res =>{
                    this.series = res.data.series
                    this.products = res.data.products
                   
                }).catch(err=>console.log(err))
            },
         },  
        created(){
            this.getCategories();
        },
    }
</script>

<style scoped>
.list{
    display: flex;
    justify-content: space-around
}
</style>
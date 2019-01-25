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
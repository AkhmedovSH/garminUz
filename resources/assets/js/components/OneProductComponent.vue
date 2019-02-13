<template>
<div class="the-wrapper">
<div class="one-product_main">
    <div class="one-product_main-images">
    <carousel style="width: 300px;" :per-page="1"  :navigationEnabled="true">
        <slide  v-for="sliderImage in jsonParsed" :key="sliderImage.id">
           
        <img :src="'/uploads/products/' + sliderImage.image" style="max-width: 300px !important">
        </slide>
    </carousel>
    </div>
  
    <div class="one-product_main-filter">
        <div class="one-product_product-title">
            <p class="product-name">{{ product.title }}</p>
            <div id="product-description">
                <p class="product-type" v-html="product.notice"></p>
                <p class="product-part_num" v-if="product.part_number != null">Номер товара: <span>{{ product.part_number }}</span></p>
                <p class="product-action_product">
                    <span> Бесплатная доставка</span>
                    <span v-if="product.in_stock != 0"> Имееться в наличии</span>
                </p>
            </div>

        <div class="product-guarantee-block">
            <p class="product-guarantee"><span>+1 Год гарантии!</span></p>
        </div>

        <div id="product-price">
                <p class="product-price" v-if="product.price != null && product.sale == null">
                <span>{{ formatPrice(product.price * dollar)  }}</span><span>Сум</span></p>

                <p class="product-price" v-if="product.price != null && product.sale != null">
                <span>{{ formatPrice( (product.price * dollar) - (product.price * dollar) * product.sale / 100)  }}
                </span><span>Сум</span></p>

                <p class="product-price" v-else><span>Не Опубликовано</span></p>
                <p class="product-price_add_info">(Цена без НДС)</p>
        </div>

        <div id="product-filter">
            <div class="product-filter_case-size" v-if="product.pa_case_size != null">
                    <div class="series-attribute">Case Size
                        <span  class="series-attribute_disappear" data-toggle="tooltip" data-placement="top" title="Представляет диаметр корпуса часов.">?</span>
                    </div>
                    <div class="series_attr_val" >
                        <ul class="d-flex list-style-default ma-0 pa-0">
                            <li><a :class="{ 'active' : product.pa_case_size == 42}">42MM</a></li>
                            <li><a :class="{ 'active' : product.pa_case_size == 47}">47MM</a></li>
                            <li><a :class="{ 'active' : product.pa_case_size == 51}">51MM</a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-filter_saphire-edition" v-if="product.pa_saphire != null">
                        <div class="series-attribute">Сапфирная версия
                            <span data-toggle="tooltip" data-placement="top" title="Имеет устойчивую к царапинам сапфировую линзу.">?</span>
                        </div>
                        <div class="series_attr_val">
                            <ul class="d-flex list-style-default ma-0 pa-0">
                                <li><a :class="{ 'active' : product.pa_saphire == 1}">ДА</a></li>
                                <li><a :class="{ 'active' : product.pa_saphire == 0}">НЕТ</a></li>
                            </ul>
                        </div>
                </div>
                <div class="product-filter_saphire-edition" v-if="product.maps != null">
                        <div class="series-attribute">Карта
                            <span data-toggle="tooltip" data-placement="top" title="Устройство имеет карту">?</span>
                        </div>
                        <div class="series_attr_val">
                            <ul class="d-flex list-style-default ma-0 pa-0">
                                <li><a :class="{ 'active' : product.maps == 1}">ДА</a></li>
                                <li><a :class="{ 'active' : product.maps == 0}">НЕТ</a></li>
                            </ul>
                        </div>
                </div>
                <div class="product-filter_pulse-ox" v-if="product.pa_pulse_ox != null">
                        <div class="series-attribute">Акклимация пульса
                            <span data-toggle="tooltip" data-placement="top" title="Показывает уровни насыщения крови кислородом, чтобы помочь контролировать, как вы приспосабливаетесь к большим высотам.">?</span>
                        </div>
                        <div class="series_attr_val">
                            <ul class="d-flex list-style-default ma-0 pa-0">
                                <li><a :class="{ 'active' : product.pa_pulse_ox == 1}">ДА</a></li>
                                <li><a :class="{ 'active' : product.pa_pulse_ox == 0}">НЕТ</a></li>
                            </ul>
                        </div>
                </div>
                <div class="series-attribute">Цвета</div>
                <div class="product-filter_color" v-if="product.series_category_id != null || product.app_store_url != null">
                    <ul class="list-style-default ma-0 d-flex flex-row-wrap pa-0">
                        <li v-for="(item,index) in products" :key="item.id">
                            <a @click.prevent="chooseProduct(index,item.slug)" class="product_series_attr enabled-img-product">
                                <img :src="'/uploads/products/' + item.image">
                             </a>
                        </li>
                    </ul>
                </div>
        </div>
        <div>
            <div>
                
                <p>Время обработки до 20 рабочих дней.</p>
                <form action="/cart" method="post">
                    <input type="hidden" name="_token" :value="csrf">
                    <input type="hidden" name="id" :value="product.id">
                    <input type="hidden" name="title" :value="product.title">
                    <input type="hidden" name="part_number" :value="product.part_number">
                    <input type="hidden" name="price" :value="product.price">
                    <button type="submit" class="add-to-cart_button">Добавить в корзину</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="one-product_description-tab">
    <div class="tab-menu_description">
        <ul class="nav nav-tabs container-85 mg-auto-horizontal" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Описание</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Спецификации</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">В коробке</a>
            </li>
        </ul>
    </div>
    <div class="tab-content container-85 mg-auto-horizontal pa-3" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div v-html="product.overview">
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
             <div v-html="product.specs">
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
             <div v-html="product.in_the_box">
            </div>
        </div>
    </div>
    
</div>
</div>
</template>
<script>
    export default {
        props:['slug','dollar'],
        data(){
            return {
                product: {}, 
                products: {}, 
                jsonParsed: {}, 
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        methods: {
           AllOrOneProduct() {
                axios.get('/one-product', {params:{slug: this.slug}}).then(res =>{
                    this.products = res.data.products
                    this.product = res.data.product
                    this.jsonParsed = JSON.parse(this.product.slider_image);
                }).catch(err=>console.log(err))
            },
            chooseProduct(index,product_slug){
                
                axios.get('/one-product-choose', {params:{slug: product_slug}}).then(res =>{
                     this.product = res.data.product
                     this.jsonParsed = JSON.parse(this.product.slider_image);
                }).catch(err=>console.log(err)) 
            },
            formatPrice(value) {
                let val = (value/1).toFixed(0).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            }
        },
        created(){
            this.AllOrOneProduct();
        },

    }
</script>
<style>
.VueCarousel-navigation-button[data-v-453ad8cd] {
    position: absolute;
    top: 30%;
    box-sizing: border-box;
    color: #000;
    text-decoration: none;
    appearance: none;
    border: none;
    background-color: transparent;
    padding: 0;
    cursor: pointer;
    outline: none;
}
.VueCarousel-dot[data-v-438fd353]{
    width: 15px!important;
    height: 15px!important;
    padding: 10px 3px!important;
}
.VueCarousel-pagination .VueCarousel-dot-container{
    margin-top: 0 !important;
}
.VueCarousel-pagination .VueCarousel-dot-container button{
    margin-top: 0 !important;
}
</style>

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
            <p class="product-name">fēnix® 5 Plus</p>
            <div id="product-description">
                <p class="product-type" v-html="product.description"></p>
                <p class="product-part_num">Part Number: <span>010-01988-07</span></p>
                <p class="product-action_product"><span> Free Shipping Available</span> </p>
            </div>

        <div id="product-price">
                <p class="product-price"><span>3199.00</span><span>Сум</span></p>
                <p class="product-price_add_info">(Price Exclusive of VAT)</p>
        </div>

        <div id="product-filter">
            <div class="product-filter_case-size">
                    <div class="series-attribute">Case Size
                        <span id="tooltip-icon">?</span>
                         <li><a href="" class="active">42MM</a></li>
                        
                        <p class="series-attribute_disappear">Represents the diameter of the watch housing.</p>
                    </div>
                    <div class="series_attr_val">
                        <ul class="d-flex list-style-default ma-0 pa-0">
                            <li><a href="" class="active">42MM</a></li>
                            <li><a href="">47MM</a></li>
                            <li><a href="">51MM</a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-filter_saphire-edition">
                        <div class="series-attribute">Sapphire Edition
                            <span id="tooltip-icon">?</span>
                            <p class="series-attribute_disappear">Sapphire edition features a scratch-resistant sapphire lens</p>
                        </div>
                        <div class="series_attr_val">
                            <ul class="d-flex list-style-default ma-0 pa-0">
                                <li><a href="" class="active">YES</a></li>
                                <li><a href="">NO</a></li>
                            </ul>
                        </div>
                </div>
                <div class="product-filter_pulse-ox">
                        <div class="series-attribute">Pulse Ox Acclimation
                            <span id="tooltip-icon">?</span>
                            <p class="series-attribute_disappear">Shows blood oxygen saturation levels to help monitor how you're adjusting to higher altitudes.</p>
                        </div>
                        <div class="series_attr_val">
                            <ul class="d-flex list-style-default ma-0 pa-0">
                                <li><a href="" class="active">YES</a></li>
                                <li><a href="">NO</a></li>
                            </ul>
                        </div>
                </div>
        </div>

        <div class="no-class" v-if="product.series_category_id != null">
            <span v-for="(item,index) in products" :key="item.id" >
                <a  @click.prevent="chooseProduct(index,item.slug)">
                    {{ item.title }}
                </a>
            </span>
        </div>

        <div>
            <div>
                <button class="add-to-cart_button">Add to Cart</button>
                <p>Processing time is 1-3 business days.</p>
            </div>
        </div>

        </div>
    </div>
</div>
<div class="one-product_description-tab">
    <div class="tab-menu_description">
        <ul class="nav nav-tabs container-85 mg-auto-horizontal" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Overview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">In the box</a>
            </li>
        </ul>
    </div>
    <div class="tab-content container-85 mg-auto-horizontal pa-3" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
           
            <p v-html="product.description">
                
            </p>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <h4>General</h4>
            <table class="table table-product">
                    <tbody>
                    <tr>
                        <td>Lens Material</td>
                        <td>Domed chemically strengthenedDomed chemically strengthened glass or sapphire crystal</td>
                    </tr>
                    <tr>
                        <td>Bezel Material</td>
                        <td>Stainless steel or titanium</td>
                    </tr>
                    <tr>
                        <td>Case material</td>
                        <td>Fibre-reinforced polymer with metal rear cover</td>
                    </tr>
                    <tr>
                        <td>Case material</td>
                        <td>Fibre-reinforced polymer with metal rear cover</td>
                    </tr>
                    <tr>
                        <td>Case material</td>
                        <td>Fibre-reinforced polymer with metal rear cover</td>
                    </tr>
                    <tr>
                        <td>Case material</td>
                        <td>Fibre-reinforced polymer with metal rear cover</td>
                    </tr>
                    <tr>
                        <td>Case material</td>
                        <td>Fibre-reinforced polymer with metal rear cover</td>
                    </tr>
                    <tr>
                        <td>Case material</td>
                        <td>Fibre-reinforced polymer with metal rear cover</td>
                    </tr>
                    </tbody>
                </table>

        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <ul>
                <li>fēnix 5 Plus</li>
                <li>Charging/data cable</li>
                <li>Documentation</li>
            </ul>
            <span>Silicone QuickFit™ 22 watch band included in the box with fēnix 5 Plus Sapphire, carbon gray DLC titanium with DLC titanium band, and fēnix 5 Plus Sapphire, black with black leather band.</span>
        </div>
    </div>
    
</div>
</div>
</template>
<script>
    export default {
        props:['slug'],
        data(){
            return {
                product: {}, 
                products: {}, 
                jsonParsed: {}, 
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
                console.log(index,product_slug)
                axios.get('/one-product-choose', {params:{slug: product_slug}}).then(res =>{
                     this.product = res.data.product
                }).catch(err=>console.log(err)) 
            },
        },
        created(){
            this.AllOrOneProduct();
        },

    }
</script>
<style>
.VueCarousel-navigation-button[data-v-453ad8cd] {
    position: absolute;
    top: 22%;
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
</style>

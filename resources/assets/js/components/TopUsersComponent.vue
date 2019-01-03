<template>
    <!-- Aside -->
<aside class="col-lg-3 col-md-4 col-xs-12">
    <!-- Aside Widget -->
    <div class="aside-widget">
        <h6> {{ $t('layout.top_users') }}</h6>
        <form @change.prevent="getParams" ref="form">
        <div class="sg-content-box__content sg-content-box__content--spaced-top">
            <div class="sg-select sg-select--full-width">
                <div class="sg-select__icon"></div>
                <select v-model="choosenTop" class="sg-select__element">
                    <option value="0">{{ $t('layout.select_topusers_bypoint') }}</option>
                    <option value="1">{{ $t('layout.select_topusers_bybooks') }}</option>
                    <option value="2">{{ $t('layout.select_topusers_bytasks') }}</option>
                </select>
            </div>
        </div>
        </form>
        <div v-if="choosenTop == 0" class="sg-content-box__content sg-content-box__content--spaced-top">
            <div>
            <div class="sg-content-box sg-content-box--full">
            <div class="sg-content-box__content sg-content-box__content--spaced-top-small">
                <div v-for="item in topUsers" :key="item.id" class="sg-actions-list">
                    <div class="sg-actions-list__hole">
                        <div class="sg-avatar sg-avatar--normal sg-avatar--spaced">
                            <a :href="'/viewprofile/' + item.id">
                                <img :src="'/uploads/avatars/' + item.avatar" class="sg-avatar__image" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="sg-actions-list__hole sg-actions-list__hole--grow">
                        <a class="sg-link sg-link--unstyled" :href="'/viewprofile/' + item.id">
                        <span class="sg-text sg-text--small sg-text--gray sg-text--emphasised">
                            <a :href="'/viewprofile/' + item.id"> {{ item.name }}</a>
                        </span>
                        </a>
                    </div>
                    <div class="sg-actions-list__hole">
                    <span class="sg-text sg-text--small sg-text--gray sg-text--emphasised">
                         {{ item.points}} B
                    </span>
                    </div>
                </div>
             </div>
             </div>
            </div>
        </div>
        <!-- This shows only when choosenTop not equal to 0 -->
         <div v-if="choosenTop != 0" class="sg-content-box__content sg-content-box__content--spaced-top">
            <div>
            <div class="sg-content-box sg-content-box--full">
            <div class="sg-content-box__content sg-content-box__content--spaced-top-small">
                <div v-for="item in topUsersTaskBook" :key="item.id" class="sg-actions-list">
                    <div class="sg-actions-list__hole">
                        <div class="sg-avatar sg-avatar--normal sg-avatar--spaced">
                            <a :href="'/viewprofile/' + item.id">
                                <img :src="'/uploads/avatars/' + item.users.avatar" class="sg-avatar__image" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="sg-actions-list__hole sg-actions-list__hole--grow">
                        <a class="sg-link sg-link--unstyled" :href="'/viewprofile/' + item.id">
                        <span class="sg-text sg-text--small sg-text--gray sg-text--emphasised">
                            <a :href="'/viewprofile/' + item.users.id"> {{ item.users.name }}</a>
                        </span>
                        </a>
                    </div>
                    <div class="sg-actions-list__hole">
                    <span class="sg-text sg-text--small sg-text--gray sg-text--emphasised">
                         {{ item.SumOfSolved}}
                    </span>
                    </div>
                </div>
             </div>
             </div>
            </div>
        </div>
    </div>
    <!-- Aside Widget -->

    <!-- Aside Widget -->
        <div class="aside-widget">
        <h6>{{ $t('layout.write_to_admin') }}</h6>
            <a href="https://t.me/akhmedovSh"><img src="/images/social/telegram.png" alt="Telegram"></a>
            <a href="https://www.instagram.com/akhmedovv_sh/"><img src="/images/social/instagram.png" alt="Instagram"></a>
        </div>
    <div class="aside-widget">
        <h6>{{ $t('layout.latest_videos') }}</h6>
         <div class="sg-content-box__content sg-content-box__content--spaced-top">
            <div>
            <div class="sg-content-box sg-content-box--full">
            <div class="sg-content-box__content sg-content-box__content--spaced-top-small">
                <div v-for="item in LastVideos" :key="item.id" class="sg-actions-list" style="margin-bottom: 5px;">
                    <div class="sg-actions-list__hole sg-actions-list__hole--grow">
                        <a class="sg-link sg-link--unstyled" :href="'/viewprofile/' + item.id">
                        <span class="sg-text sg-text--small sg-text--gray sg-text--emphasised">
                            <a v-if="item.free == 1" :href="'/subscriber/' + item.id"> {{ item.title.slice(0,17) + "..." }}</a>
                            <a v-else :href="'/free/' + item.id"> {{ item.title.slice(0,17) + "..." }}</a>
                        </span>
                        </a>
                    </div>
                    <div class="sg-actions-list__hole">
                    <span class="sg-text sg-text--small sg-text--gray sg-text--emphasised">
                        {{item.scategory.title_uz}}
                    </span>
                    </div>
                </div>
             </div>
             </div>
            </div>
        </div>
    </div>

<!--     <div class="aside-widget">
        <a href="javascript:void(0);">
            <img :src='"/images/add-banner-1.jpg"' alt="">
        </a>
    </div> -->
</aside>
</template>
<script>
export default {
  data(){
    return {
        topUsers: [], //here will come top users by points
        topUsersTaskBook: [], //here will come top users by solutions and taskanswers
        choosenTop: 0,
        LastVideos: [],
    }
    },
    methods: {
        
    getParams(){
        if (this.choosenTop == 0) {
           if (this.topUsers.length > 0) {
               return;
           }else{
                this.getTopUsers();
           }
          
        }
         if (this.choosenTop == 1) {
            this.getTopUsersTask();
           
        }
         if (this.choosenTop == 2) {
            this.getTopUsersBook();
        }
    },
    getLastVideos(){
        axios.get("/api/getLastVideos")
            .then(res => {
                this.LastVideos = res.data
            })
            .catch(err=>console.log(err));
        },
    getTopUsers(){
        axios.get("/api/getTopUsers")
            .then(res => {
                this.topUsers = res.data
            })
            .catch(err=>console.log(err));
        },
    getTopUsersTask(){
        axios.get("/api/getTopUsersTask")
            .then(res => {
                this.topUsersTaskBook = res.data
            })
            .catch(err=>console.log(err));
        },
    getTopUsersBook(){
        axios.get("/api/getTopUsersBook")
            .then(res => {
                this.topUsersTaskBook = res.data
            })
            .catch(err=>console.log(err));
        },  

    },
    created(){
        this.getTopUsers();
        this.getLastVideos();
    },
}
</script>

<style>

</style>

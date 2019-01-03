<template>
<div @click.prevent="openNotifications()" class="js-notifications-box">
    <button class="sg-icon-as-button js-panel-button js-panel-button-icon sg-icon-as-button--light sg-icon-as-button--transparent">
        <div class="sg-icon-as-button__hole">
            <div class="sg-overlayed-box">
                <i class="fa fa-bell sg-icon sg-icon--x24 sg-icon--adaptive" aria-hidden="true"></i>
                <div v-if="notifications_count != 0" class="js-counter sg-overlayed-box__overlay">
                    <div class="sg-badge sg-badge--peach sg-badge--rounded">
                        <div class="js-counter-value sg-text sg-text--emphasised sg-text--light sg-text--notify">
                        {{ notifications_count }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </button>

    
<div  v-show="notifications_show" class="brn-menu-panel brn-menu-panel--spaced-top brn-menu-panel--restrict-height js-panel-content">
        <div class="sg-bubble sg-bubble--full sg-bubble--top sg-bubble--row-end">
            <div class="sg-content-box dock-box dock-box--top-only">
                <div class="sg-content-box__header dock-box__top">
                    <h2 class="sg-headline sg-headline--small">
                        Уведомление!
                    </h2>
                </div>
                <div class="sg-content-box__content sg-content-box__content--full">
                    <div class="sliding-panel js-sliding-panel">
                        <div class="sliding-panel__wrapper">
                            <div class="sliding-panel__element">
                                <div class="brn-menu-panel__scrollable js-scrollable-container">
                                    <ul class="sg-list sg-list--spaced-elements js-items-container">
                                        <span  v-for="item in notifications" :key="item.id">
                                        <li class="sg-list__element">
                                            <div :class="item.status == 0 ? 'sg-media--focused' : 'sg-media--read'" class="sg-media sg-media--clickable  js-notification">
                                                <div class="sg-media__aside">
                                                    <div class="sg-avatar">
                                                        <a @click.prevent="redirectToUserPage(item.user_id)">
                                                            <img :src="'/uploads/avatars/' + item.users.avatar" class="sg-avatar__image" :alt="item.users.name" :title="item.users.name">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div @click.prevent="redirectToTaskPage(item.task_id)" class="sg-media__wrapper">
                                                    <div class="sg-media__content sg-media__textnotuppercase">											
                                                    {{ item.content }}
                                                    </div>
                                                    <div class="sg-media__content sg-media__content--small">
                                                        <time>{{ item.created_at }}</time>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        </span>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>

</template>

<script>

export default {
    props: ['auth_user'],
    data(){
        return{
            notifications: null,
            notifications_show: false,
            notifications_count: 0,
        }
    },
     methods: {
         redirectToUserPage(user_id){
              window.location = "/viewprofile/"+user_id+"";
         },
         redirectToTaskPage(task_id){
              window.location = "/task/"+task_id+"";
         },
         openNotifications(){
            if(this.notifications_show == false){
                this.notifications_show = true,
                this.notifications_count = 0
            axios
            .post('/api/notificationsRead',{ auth_user: this.auth_user }).catch(err=>console.log(err)); 
            }else{
                this.notifications_show = false
            }    
         },
         getAllNotifications(){
            axios
            .post('/api/getNotifications',{ auth_user: this.auth_user })
            .then(response =>{
                this.notifications = response.data.tasks, this.notifications_count = response.data.count
            })
             .catch(err=>console.log(err));
         },
    },
     created(){
         //сдесь будет приходить сколько ответов пришло определенной задаче
         this.getAllNotifications();
    },
}    

</script>

<style>

</style>

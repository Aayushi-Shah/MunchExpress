<template>
    <div class="resto-group__wrapper mb-5">
        <div class="row">
            <div class="col-md-4 mb-4" v-for="resto in localResto" :key="resto.id">
                <card-component>
                    <template slot="title">
                        {{ resto.name }}
                    </template>
                    <template slot="body">
                        <div class="d-flex align-items-center">
                            <img src="pin.svg" class="icon-size m-1">
                            {{ resto.location }}
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="umbrella.svg" class="icon-size m-1">
                            {{ resto.tables }}
                        </div>
                        <br>
                        <a v-bind:href="resto.slug" class="card-link ml-1">Menu</a>
                        <a v-bind:href="resto.ordersSlug" class="card-link ml-1">Orders</a>
                    </template>
                </card-component>
            </div>
            <div class="col-md-4" v-if="showAddForm">
                <card-component>
                    <template slot="title">Add New Resturant</template>
                    <template slot="body">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="more.svg" class="plus-icon-size m-1" @click="handleAddNewResturant">
                        </div>
                    </template>
                </card-component>
                <Modal name="add-new-resto" height="400px">
                    <div class="container-padding">
                        <resto-add-form @modalCancel="handleCancelResto" @addRestoEvent="handleAddResto"></resto-add-form>
                    </div>
                </Modal>
            </div>
        </div>
    </div>
</template>

<script>
import RestoAddForm from './RestoAddForm';
import axios from 'axios';

export default {
    components: {
       RestoAddForm
    },
    props: ['restos'],
    created() {
        this.localResto = this.restos
    },
    computed : {
        showAddForm(){
            return (this.localResto.length < 5) ? true : false
        }
    },
    data(){
        return {
            localResto : []
        }
    },
    methods: {
        handleAddNewResturant(){
            this.$modal.show('add-new-resto');
        },
        handleAddResto(resto_data){
            axios.post('/api/resto', resto_data).then(response=>this.localResto.unshift(response.data))
            this.$modal.hide('add-new-resto');

        },
        handleCancelResto(){
            this.$modal.hide('add-new-resto');
        }
    }
}
</script>

<template>
    <div class="row">
        <div class="col-md-7">
            <h3>Customer Details</h3>
            <order-form></order-form>

            <div class="mb-5">
                <h3>Order Deatils <span class="float-right" v-if="finalAmount >0 "> {{ finalAmount }}</span></h3>
                <order-details :order-details="orderDetails "></order-details>
            </div>
        </div>
        <div class="col-md-5">
            <h3>Menu</h3>
            <order-menu-items :items="menuItems" @menuItemAdded="handleNewMenuItem"></order-menu-items>
        </div>
    </div>
</template>

<script>
import OrderForm from './OrderForm'
import OrderMenuItems from './OrderMenuItems'
import OrderDetails from './OrderDetails'
import axios from 'axios'
export default {
    props:['restoId'],
    data(){
        return{
            menuItems: [],
            orderDetails: []
        }
    },
    components: {
        OrderForm, OrderMenuItems, OrderDetails
    },
    created(){
        this.loadRestoMenuItems()
    },
    computed: {
        finalAmount(){
            let price = 0;
            this.orderDetails.forEach(order => {
                price = price + order.price;
            })

            return price
        }
    },
    methods: {
        loadRestoMenuItems(){
            let postData = {restoId: this.restoId}
            axios.post('/api/resto/menu', postData)
                .then(response=>console.log(this.menuItems = response.data))
                .catch(error=>console.log(error.response))
        },
        handleNewMenuItem(item){
            this.orderDetails.unshift(item);
        }
    }
}
</script>

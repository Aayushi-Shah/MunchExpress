<template>
<div class="add_form__wrapper">
    <form v-on:submit.prevent="handleSubmit">
        <div class="form-group">
            <label for="name">Food Item</label>
            <input type="text" class="form-control" placeholder="Enter Food Item Name" v-model="food.item">
            <div class="validation-message" v-text="Validation.getMessage('item')"></div>
        </div>

        <div class="form-group">
            <label for="name">Select Category</label>
            <multiselect
                v-model="food.category"
                :options="categories"
            ></multiselect>
            <div class="validation-message" v-text="Validation.getMessage('category')"></div>
        </div>

        <div class="form-group">
            <label for="name">Price</label>
            <input type="number" class="form-control" placeholder="Enter Food Item Price" v-model="food.price">
            <div class="validation-message" v-text="Validation.getMessage('price')"></div>
        </div>

        <div class="form-group">
            <label for="name">Description</label>
            <textarea class="form-control" v-model="food.description" placeholder="Enter Food Description"></textarea>
            <div class="validation-message" v-text="Validation.getMessage('description')"></div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import Validation from './../../utils/Validation'

export default {
  props: ['categories', 'restoId'],
  components: {
    Multiselect
  },
  data() {
    return {
      food: this.emptyFoodItem(),
      Validation: new Validation()
    }
  },
  methods: {
    emptyFoodItem(){
        return {
            item: '',
            category: '',
            price: 100,
            description: ''
        }
    },
    async handleSubmit() {
        let postData = this.food;
        postData.restoId = this.restoId;
        await window.axios.post('api/item/save', postData).then(response => {
            console.log('Response', response.data);
            this.$emit('newMenuItemAdded', response.data, postData.category);
            this.food = this.emptyFoodItem();
        }).catch(error => {
            console.log('error', error.response)
            if(error.response.status == 422){
                this.Validation.setMessages(error.response.data.errors);
            }
            })

    }
  }
}
</script>

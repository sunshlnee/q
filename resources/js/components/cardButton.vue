<template>
    <div>
        <div v-if="hasInCart">
            <i class="fas fa-shopping-cart" @click="remove" :class="{'card-button-red': hasInCart}"></i>
        </div>

        <div v-else>
            <i class="fas fa-shopping-cart" @click="add" :class="{'card-button-green': !hasInCart}"></i>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product', 'has'],
        data: function () { 
            return { 
                hasInCart : this.has,
                path: '/products/show/' + this.product + '/card'
            }
        },

        methods: {
            add: function() {
                axios.post(this.path).then(response => { 
                    this.toggleCart()
                    this.$notify({
                        group: 'cart',
                        text: 'Товар добавлен в корзину',
                        type: 'success',
                    }); 
                })
            },

            remove: function() {
                axios.delete(this.path).then(response => { 
                    this.toggleCart() 
                    this.$notify({
                        group: 'cart',
                        text: 'Товар удален из корзины',
                        type: 'error',
                    });
                })
                
            },
            
            toggleCart: function() {
                if (this.hasInCart === true) { this.hasInCart = false }
                else { this.hasInCart = true }
            },
        }
    }
</script>


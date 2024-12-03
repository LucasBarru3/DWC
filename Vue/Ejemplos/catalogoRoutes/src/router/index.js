import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ProductList from '../views/ProductList.vue'
import ProductDetails from '../views/ProductDetails.vue'
import AddProduct from '../views/AddProduct.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/products',
      name: 'ProductList',
      component: ProductList,
    },
    {
      path: '/product/:id',  // Ruta para ver los detalles del producto
      name: 'productDetails',
      component: ProductDetails,
    },
    {
      path: '/add-product',
      name: 'addProduct',
      component: AddProduct,
    },
  ],
})
export default router

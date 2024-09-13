import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import ProductDetail from './components/ProductDetail.vue';


app.component('example-component', ExampleComponent);
app.component('product-details', ProductDetail);


app.mount('#app');

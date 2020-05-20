<template>
    <div class="row">
        <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-xs-12 border-right">
            <Cartera></Cartera>
        </div>
        <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header text-center" style="padding: 8px 0px 0px 0px;">
                    <i class="feather icon-shopping-bag" style="font-size: 30px;"></i>
                </div>
                <div class="card-body">
                    <Carrito></Carrito>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Cartera from "./Cartera";
    import Carrito from './CarritoRight';

    export default {
        name: "Index",
        components: {
            Cartera,
            Carrito
        }
    }
</script>

<style scoped>

</style>

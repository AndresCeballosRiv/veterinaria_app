<template>
    <div>
        <div class="container d-flex justify-content-around mt-4">
            <router-link v-if="link1()" :to="{name: 'history'}" class="btn btn-lg btn-primary">
                Historia Clinica
            </router-link>
            <router-link v-if="link2()" :to="{name: 'historyDetail'}" class="btn btn-lg btn-primary">
                Detalle Historia Clinica
            </router-link>
            <router-link v-if="link3()" to="/" class="btn btn-lg btn-primary">
                Regresar a Inicio
            </router-link>
        </div>

        <transition name="slide-fade" mode="out-in">
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>
    export default {
        methods: {
            link1() {
                if (this.$route.path == "/" || this.$route.path == "/clinic-history-detail") {
                    return true
                } else {
                    return false
                }
            },
            link2() {
                if (this.$route.path == "/" || this.$route.path == "/clinic-history") {
                    return true
                } else {
                    return false
                }
            },
            link3() {
                if (this.$route.path != "/") {
                    return true
                } else {
                    return false
                }
            },
        }
    }

</script>

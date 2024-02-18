<template>
    <v-layout class="rounded-md">
        <v-app-bar color="surface-variant" title="SISTEMA DE ARCHIVOS">

            <v-menu color="light-blue lighten-2">
                <template v-slot:activator="{ props }">
                    <v-btn variant="outlined" color="white" v-bind="props">
                        {{ $page.props.auth.user.name }}
                    </v-btn>
                </template>
                <v-list color="light-blue lighten-2">
                    <v-list-item @click="redirectTo('profile')" title="Perfil"></v-list-item>
                    <v-list-item @click="logoutAndRedirect()" title="Cerrar Sesión"></v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>

        <v-main class="d-flex align-center flex-column" style="min-height: 300px;">
            <!-- muestra las pestañas principales -->
            <main-component>
            </main-component>
            <slot name="main-content"></slot>
        </v-main>
    </v-layout>
</template>
<script>
import MainComponent from '@/Components/MainComponent.vue';
export default {
    methods: {
        redirectTo(routeName) {
            console.log('Redirigiendo a:', routeName);
            switch (routeName) {
                case 'profile':
                    window.location.href = '/profile'; // Reemplaza con la ruta de Laravel
                    break;
                case 'editor':
                    window.location.href = '/editor'; // Reemplaza con la ruta de Laravel
                    break;
            }
        },
        logoutAndRedirect() {
            axios.post('/logout').then(() => (window.location.href = '/'));
        },
    },
    components: { MainComponent }
};
</script>
<style lang="">
    
</style>
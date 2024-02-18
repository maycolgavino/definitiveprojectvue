<template>
    <div>
        <!-- Academic Search -->
        <v-card class="mx-auto" width="550" prepend-icon="mdi-school">
            <template v-slot:title>
                Búsqueda Académica
            </template>
            <v-card-text>
                <div>
                    <v-btn class="ma-2" color="white">
                        Actualizar
                        <v-icon end icon="mdi-note-edit"></v-icon>
                    </v-btn>
                    <v-btn class="ma-2" color="white">
                        Agregar
                        <v-icon end icon="mdi-pencil"></v-icon>
                    </v-btn>
                    <v-btn class="ma-2" color="white">
                        Búsqueda
                        <v-icon end icon="mdi-clipboard-text-search"></v-icon>
                    </v-btn>
                </div>
            </v-card-text>
        </v-card>

        <!-- Document Search -->
        <v-card class="mx-auto" width="550" prepend-icon="mdi-file-document">
            <template v-slot:title>
                Búsqueda Documentaria

            </template>

            <v-card-text>
                <div>
                    <v-btn class="ma-2" color="white">
                        Actualizar
                        <v-icon end icon="mdi-note-edit"></v-icon>
                    </v-btn>
                    <v-btn class="ma-2" color="white">
                        Agregar
                        <v-icon end icon="mdi-pencil"></v-icon>
                    </v-btn>
                    <v-btn class="ma-2" color="white">
                        Búsqueda
                        <v-icon end icon="mdi-clipboard-text-search"></v-icon>
                    </v-btn>
                </div>
            </v-card-text>
        </v-card>

    </div>
</template>
<script>
export default {

}
</script>
<style lang="">
    
</style>
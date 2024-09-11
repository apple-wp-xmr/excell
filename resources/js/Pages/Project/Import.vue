<template>
    <div>
        <div class="flex justify-center">
            <form class="flex">
                <input
                    class="w=16 rounded-full mr-2"
                    type="number"
                    min="1"
                    max="2"
                    v-model="type"
                />
                <input
                    @change="setExcell"
                    type="file"
                    ref="file"
                    class="hidden"
                />
                <a
                    href="#"
                    @click.prevent="selectExcell"
                    class="block rounded-full bg-green-600 w-32 text-center text-white p-2"
                    >Excell</a
                >
            </form>
            <div v-if="file" class="ml-3">
                <a
                    href="#"
                    @click.prevent="importExcell"
                    class="block rounded-full bg-sky-600 w-32 text-center text-white p-2"
                    >Import</a
                >
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    name: "Import",
    layout: MainLayout, // Attach the layout here
    methods: {
        selectExcell() {
            this.$refs.file.click();
        },
        setExcell(e) {
            this.file = e.target.files[0];
        },
        importExcell() {
            const formData = new FormData();
            formData.append("file", this.file);
            formData.append("type", this.type);
            this.$inertia.post("/projects/import", formData, {
                onSuccess: () => {
                    this.file = null;
                    this.$refs.file.value = null;
                },
            });
        },
    },
    data() {
        return {
            file: null,
            type: 1,
        };
    },
};
</script>
<style scoped></style>

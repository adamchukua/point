<template>
    <div>
        <div class="row">
            <div class="col-4 mb-3" v-for="src in previews">
                <div class="image-upload-list-item">
                    <img
                        class="image-upload-list-item--img"
                        v-if="src && src.length" :src="src"
                        alt="">
                    <p class="image-upload-list-item--hided">Видалити</p>
                </div>
            </div>

            <label for="upload">
                <div class="col-12">
                    <div class="image-upload-list--add btn btn-second w-100 mt-1 py-2">
                        Додати фото (0/10)
                    </div>
                </div>
            </label>

            <v-file-input
                accept="image/*"
                multiple
                label="Add your files"
                chips
                filled
                prepend-icon="mdi-camera"
                @change="onAddFiles"
            ></v-file-input>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                previews: [],
                errorImage: "url of an image to use to indicate an error",
            }
        },

        methods: {
            onAddFiles(files) {
                this.previews = [];

                files.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.addEventListener('load', e => this.previews[index] = e.target.result);
                    reader.addEventListener('error', e => this.previews[index] = this.errorImage);
                    reader.readAsDataURL(file);
                });
            }
        }
    }
</script>

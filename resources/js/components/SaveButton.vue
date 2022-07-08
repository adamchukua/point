<template>
    <div>
        <button class="btn">
            <svg
                class="hotel--save"
                :class="getStatusStyle"
                @click="save()"

                viewBox="0 0 24 24"
                fill="none"
                stroke="#000"
                stroke-width="1.4"
                stroke-linecap="round"
                stroke-linejoin="round"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
        </button>
    </div>
</template>

<script>
    export default {
        props: ['hotelId', 'status'],

        data() {
            return {
                statusStyle: this.status
            }
        },

        methods: {
            save() {
                axios.post('/profile/saveHotel/' + this.hotelId)
                    .then(response => {
                        this.statusStyle = !this.statusStyle;
                    })
                    .catch(errors => {
                        if (errors.response.status === 401) {
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            getStatusStyle() {
                return (this.statusStyle) ? 'hotel--save__saved' : '';
            }
        }
    }
</script>
